<?php

namespace RebelCode\Spotlight\Instagram\IgApi;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Psr\Http\Message\ResponseInterface;
use Psr\SimpleCache\CacheException as PsrCacheException;
use Psr\SimpleCache\CacheInterface;
use RuntimeException;

/**
 * Utilities for the API client.
 *
 * @since 0.1
 */
class IgApiUtils
{
    /**
     * Sends a request and detects erroneous IG responses.
     *
     * @since 0.1
     *
     * @param ClientInterface $client  The client driver.
     * @param string          $method  The HTTP method.
     * @param string          $uri     The URI to send the request to.
     * @param array           $options Request options. See Guzzle's docs for available options.
     *
     * @return ResponseInterface The response.
     */
    public static function request(ClientInterface $client, string $method, string $uri, array $options = [])
    {
        try {
            return $client->request($method, $uri, $options);
        } catch (RequestException $e) {
            $response = $e->getResponse();
            $body = ($response) ? $response->getBody() : null;
            $decoded = ($body === null) ? [] : json_decode($body->getContents(), true) ?? [];
            $error = $decoded['error'] ?? $decoded;
            $message = $error['error_description'] ??
                       $error['error_message'] ??
                       $error['message'] ??
                       '[error details could not be retrieved]';
            $code = $error['code'] ?? '?';
            $type = $error['type'] ?? 'Unknown';

            $fullMessage = sprintf('Error #%d [%s]: %s', $code, $type, $message);

            throw new RuntimeException('The Instagram API responded with an error: ' . $fullMessage);
        } catch (GuzzleException $ge) {
            // Should never be thrown. Catching RequestInterface should cover everything
            throw new RuntimeException('GuzzleException was thrown: ' . $ge->getMessage(), $ge->getCode(), $ge);
        }
    }

    /**
     * Sends a request, or uses a cache.
     *
     * @since 0.1
     *
     * @param CacheInterface $cache     The cache instance.
     * @param string         $key       The key to read responses from or write new responses to.
     * @param callable       $getRemote The actual request dispatching function to invoke when the key is not in cache.
     *
     * @return array The parsed response.
     *
     * @throws CacheExceptionInterface
     */
    public static function getCachedResponse(CacheInterface $cache, string $key, callable $getRemote)
    {
        try {
            if ($cache->has($key)) {
                return json_decode($cache->get($key), true);
            }
        } catch (PsrCacheException $e) {
            // Carry on with normal request
        }

        $response = ($getRemote)();

        $result = ($response instanceof ResponseInterface)
            ? static::parseResponse($response)
            : $response;

        $attempt = 1;

        do {
            try {
                $cache->set($key, json_encode($result), 1800);
                break;
            } catch (PsrCacheException $e) {
                // Do nothing
            }

            error_log($e->getMessage() . " (attempt $attempt of 3)");

            $attempt++;
            if ($attempt > 3) {
                break;
            }
        } while (true);

        return $result;
    }

    /**
     * Parses an IG response, decoding JSON bodies or detecting errors, if any.
     *
     * @since 0.1
     *
     * @param ResponseInterface $response The response.
     *
     * @return array The decoded JSON response body.
     */
    public static function parseResponse(ResponseInterface $response)
    {
        static::checkResponseStatus($response);

        $body = $response ? $response->getBody() : null;
        $raw = $body ? $body->getContents() : null;
        $decoded = json_decode($raw, true);

        if ($decoded === false) {
            throw new RuntimeException("Received malformed response: {$raw}");
        }

        if (isset($decoded['error']) || isset($decoded['error_message'])) {
            $message = isset($decoded['error'])
                ? $decoded['error_description']
                : $decoded['error_message'];

            throw new RuntimeException("API error: {$message}");
        }

        return $decoded;
    }

    /**
     * Checks a response's status to determine if its an erroneous response.
     *
     * @since 0.1
     *
     * @param ResponseInterface $response
     */
    public static function checkResponseStatus(ResponseInterface $response)
    {
        $statusCode = $response->getStatusCode();

        if ($statusCode !== 200) {
            $statusPhrase = $response->getReasonPhrase();
            throw new RuntimeException("API responded with {$statusCode} {$statusPhrase}");
        }
    }

    /**
     * Retrieves the fields available for users from the basic display API.
     *
     * @since 0.1
     *
     * @return string[]
     */
    public static function getBasicUserFields() : array
    {
        return [
            'id',
            'username',
            'media_count',
            'account_type',
        ];
    }

    /**
     * Retrieves all the fields available for users from the Graph API.
     *
     * @since 0.1
     *
     * @return string[]
     */
    public static function getGraphUserFields() : array
    {
        return [
            'id',
            'username',
            'name',
            'biography',
            'media_count',
            'followers_count',
            'follows_count',
            'profile_picture_url',
            'website',
        ];
    }

    /**
     * Retrieves the fields for media objects from a personal account.
     *
     * @since 0.5.1
     *
     * @param bool $isOwn True to get the fields for media that are owned by the personal account that is fetching them,
     *                    or false for media from other accounts.
     *
     * @return string[]
     */
    public static function getPersonalMediaFields(bool $isOwn = true)
    {
        $fields = [
            'id',
            'username',
            'timestamp',
            'caption',
            'like_count',
            'comments_count',
            'media_type',
            'media_url',
            'permalink',
            sprintf('children{%s}', implode(', ', static::getChildrenMediaFields())),
        ];

        if ($isOwn) {
            $fields[] = 'thumbnail_url';
        }

        return $fields;
    }

    /**
     * Retrieves the fields for media objects from a business account.
     *
     * @since 0.5.1
     *
     * @param bool $isOwn True to get the fields for media that are owned by the business account that is fetching them,
     *                    or false for media from other accounts.
     *
     * @return string[]
     */
    public static function getBusinessMediaFields(bool $isOwn = true)
    {
        $fields = static::getPersonalMediaFields($isOwn);

        if ($isOwn) {
            $fields[] = sprintf('comments{%s}', implode(', ', static::getCommentFields()));
        }

        return $fields;
    }

    /**
     * Retrieves the fields for story media objects.
     *
     * @since 0.5.1
     *
     * @return string[]
     */
    public static function getStoryMediaFields()
    {
        return static::getPersonalMediaFields(true);
    }

    /**
     * Retrieves the fields for media objects from hashtags.
     *
     * @since 0.1
     *
     * @return string[]
     */
    public static function getHashtagMediaFields() : array
    {
        $fields = [
            'id',
            'caption',
            'like_count',
            'comments_count',
            'media_type',
            'media_url',
            'permalink',
            'timestamp',
        ];

        $list = implode(',', static::getChildrenMediaFields());
        $fields[] = "children{{$list}}";

        return $fields;
    }

    /**
     * Retrieves the fields for children media objects.
     *
     * @since 0.1
     *
     * @return string[]
     */
    public static function getChildrenMediaFields() : array
    {
        return [
            'id',
            'media_url',
            'media_type',
            'permalink',
            'thumbnail_url',
        ];
    }

    /**
     * Retrieves the field for comment objects.
     *
     * @since 0.1
     *
     * @return string[]
     */
    public static function getCommentFields() : array
    {
        return [
            'id',
            'username',
            'text',
            'timestamp',
            'like_count',
        ];
    }
}
