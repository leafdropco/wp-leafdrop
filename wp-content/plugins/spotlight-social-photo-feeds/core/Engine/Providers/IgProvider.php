<?php

namespace RebelCode\Spotlight\Instagram\Engine\Providers;

use Exception;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Uri;
use RebelCode\Iris\Item;
use RebelCode\Iris\Result;
use RebelCode\Iris\Source;
use RebelCode\Spotlight\Instagram\IgApi\IgApiUtils;
use RebelCode\Spotlight\Instagram\Utils\Arrays;

class IgProvider
{
    const BASIC_API_URL = 'https://graph.instagram.com';
    const GRAPH_API_URL = 'https://graph.facebook.com';

    public static function request(
        ClientInterface $client,
        Source $source,
        string $url,
        array $query = [],
        bool $setNext = true
    ) {
        try {
            $uri = new Uri($url);
            parse_str($uri->getQuery(), $prevQuery);

            $newQuery = array_merge($prevQuery, $query);
            $newQuery = http_build_query($newQuery, null, '&', PHP_QUERY_RFC3986);

            $response = IgApiUtils::request($client, 'GET', (string) $uri->withQuery($newQuery));
            $body = IgApiUtils::parseResponse($response);
        } catch (Exception $exception) {
            return Result::error($exception->getCode(), $exception->getCode());
        }

        return static::createResult($client, $source, $body, $setNext);
    }

    public static function createResult(ClientInterface $client, Source $source, array $body, bool $setNext = true)
    {
        $data = $body['data'] ?? [];
        $items = Arrays::map($data, function (array $data) use ($source) {
            return Item::create($data['id'], $source, $data);
        });

        $result = Result::success($items);
        $result->data['paging'] = $body['paging'] ?? [];

        $next = $body['paging']['next'] ?? null;

        if (!empty($next) && $setNext) {
            $result->next = function () use ($client, $source, $next) {
                return static::request($client, $source, $next);
            };
        }

        return $result;
    }
}
