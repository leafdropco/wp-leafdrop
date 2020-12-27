<?php

namespace RebelCode\Spotlight\Instagram\MediaStore\Processors;

use Exception;
use RebelCode\Iris\Item;
use RebelCode\Iris\Source;
use RebelCode\Spotlight\Instagram\MediaStore\IgCachedMedia;
use RebelCode\Spotlight\Instagram\Utils\Files;
use RuntimeException;
use stdClass;

/**
 * The media processor that downloads images files to create thumbnails.
 *
 * @since 0.4.1
 */
class MediaDownloader
{
    // The name of the thumbnails directory within the WordPress uploads directory.
    const DIR_NAME = "spotlight-insta";
    // The string identifiers for the image sizes
    const SIZE_SMALL = 's';
    const SIZE_MEDIUM = 'm';
    // The image sizes
    const SIZES = [
        self::SIZE_SMALL,
        self::SIZE_MEDIUM,
    ];
    // The image sizes to be generated
    const TO_GENERATE = [
        self::SIZE_SMALL => 480,
        self::SIZE_MEDIUM => 600,
    ];
    // The image quality to be generated
    const JPEG_QUALITY = [
        self::SIZE_SMALL => 80,
        self::SIZE_MEDIUM => 90,
    ];

    /**
     * Downloads all files for a given media.
     *
     * @since 0.4.1
     *
     * @param IgCachedMedia $media The media.
     */
    public static function downloadMediaFiles(IgCachedMedia $media)
    {
        $item = static::downloadItemFiles(Item::create($media->id, Source::auto($media->source->type), [
            'media_type' => $media->type,
            'media_url' => $media->url,
            'thumbnail_url' => $media->thumbnail,
        ]));

        $media->thumbnail = $item->data['thumbnail'];
        $media->thumbnails = $item->data['thumbnails'];
    }

    /**
     * Downloads all files for a given media.
     *
     * @since 0.5
     *
     * @param Item $item
     *
     * @return Item
     */
    public static function downloadItemFiles(Item $item) : Item
    {
        $newItem = clone $item;

        $id = $item->id;
        $type = $item->data['media_type'] ?? '';
        $url = $item->data['media_url'] ?? '';
        $thumbnail = $item->data['thumbnail_url'] ?? '';

        if ($type === 'VIDEO') {
            $ogImageUrl = !empty($thumbnail)
                ? $thumbnail
                : null;
        } else {
            $ogImageUrl = $url;
        }

        if (!empty($ogImageUrl)) {
            $ogImgPath = static::getThumbnailFile($id, null)['path'];

            try {
                // Download the image if it doesn't exist
                if (!file_exists($ogImgPath)) {
                    static::downloadFile($ogImageUrl, $ogImgPath);
                }

                // Set the item's main thumbnail to point to the original image
                $newItem->data['thumbnail_url'] = $ogImageUrl;

                // Generate smaller sizes of the original image
                static::generateSizes($id, $ogImgPath);

                // Then remove the original file (unless its for a video post)
                if (file_exists($ogImgPath)) {
                    @unlink($ogImgPath);
                }

                // Update the item's thumbnail list
                $newItem->data['thumbnails'] = static::getAllThumbnails($id, true);
            } catch (Exception $exception) {
                // do nothing
            }
        }

        return $newItem;
    }

    /**
     * Generates the different sized thumbnails for a given media.
     *
     * @since 0.4.1
     *
     * @param string $mediaId  The ID of the media.
     * @param string $filepath The path to the file that contains the full image.
     */
    public static function generateSizes(string $mediaId, string $filepath)
    {
        foreach (static::TO_GENERATE as $size => $width) {
            $filePath = static::getThumbnailFile($mediaId, $size)['path'];

            if (!file_exists($filePath)) {
                $editor = wp_get_image_editor($filepath);

                if (!is_wp_error($editor)) {
                    @$editor->resize($width, null);
                    @$editor->set_quality(static::JPEG_QUALITY[$size]);
                    @$editor->save(static::getThumbnailFile($mediaId, $size)['path'], 'image/jpeg');
                }
            }
        }
    }

    /**
     * Retrieves the path and URL to a thumbnail file for a specific media and a given size.
     *
     * @since 0.4.1
     *
     * @param string      $mediaId The ID of the media.
     * @param string|null $size    The size of the thumbnail to retrieve.
     *
     * @return string[] An array containing 2 keys: "path" and "url"
     */
    public static function getThumbnailFile(string $mediaId, $size = null) : array
    {
        $dir = static::getThumbnailsDir();
        $filename = $mediaId . (empty($size) ? '' : '-' . $size) . '.jpg';

        return [
            'path' => $dir['path'] . '/' . $filename,
            'url' => $dir['url'] . '/' . $filename,
        ];
    }

    /**
     * Retrieves the paths or URLs for all the generated thumbnails for a given media.
     *
     * @since 0.4.1
     *
     * @param string $mediaId The ID of the media.
     * @param bool   $urls    If true, URLs will be returned. If false, paths will be returned. Both URLs and paths
     *                        are absolute.
     *
     * @return string[] An array containing all the generated thumbnails.
     */
    public static function getAllThumbnails(string $mediaId, bool $urls = false) : array
    {
        $thumbnails = [];

        $largeFile = static::getThumbnailFile($mediaId, null);
        if (file_exists($largeFile['path'])) {
            $thumbnails['l'] = $largeFile[$urls ? 'url' : 'path'];
        }

        foreach (static::SIZES as $size) {
            $file = static::getThumbnailFile($mediaId, $size);

            if (file_exists($file['path'])) {
                $thumbnails[$size] = $file[$urls ? 'url' : 'path'];
            }
        }

        return $thumbnails;
    }

    /**
     * Retrieves the path and URL to the thumbnails directory.
     *
     * @since 0.4.1
     *
     * @return string[] An array containing 2 keys: 'path' and 'url'.
     */
    public static function getThumbnailsDir() : array
    {
        $uploadDir = wp_upload_dir();

        if (isset($uploadDir['error']) && $uploadDir['error'] !== false) {
            throw new RuntimeException(
                'Spotlight failed to access your uploads directory: ' . $uploadDir['error']
            );
        }

        if (!is_dir($uploadDir['basedir'])) {
            if (!mkdir($uploadDir['basedir'], 0775)) {
                throw new RuntimeException(
                    'Spotlight failed to create the uploads directory: ' . $uploadDir['basedir']
                );
            }
        }

        $subDir = $uploadDir['basedir'] . '/' . static::DIR_NAME;
        if (!is_dir($subDir)) {
            if (!mkdir($subDir, 0775)) {
                throw new RuntimeException(
                    'Spotlight failed to create its photo uploads directory: ' . $subDir
                );
            }
        }

        return [
            'path' => $subDir,
            'url' => $uploadDir['baseurl'] . '/' . static::DIR_NAME,
        ];
    }

    /**
     * Deletes the thumbnails directory and all files within.
     *
     * @since 0.4.1
     */
    public static function clearThumbnailsDir()
    {
        $dir = MediaDownloader::getThumbnailsDir();
        Files::rmDirRecursive($dir['path']);
    }

    /**
     * Downloads a remote file.
     *
     * @since 0.4.1
     *
     * @param string $url      The URL that points to the resource to be downloaded.
     * @param string $filepath The path to the file to which the resource will downloaded to.
     */
    public static function downloadFile(string $url, string $filepath)
    {
        $curl = curl_init($url);

        if (!$curl) {
            throw new RuntimeException(
                'Spotlight was unable to initialize curl. Please check if the curl extension is enabled.'
            );
        }

        $file = @fopen($filepath, 'wb');

        if (!$file) {
            throw new RuntimeException(
                'Spotlight was unable to create the file: ' . $filepath
            );
        }

        try {
            // SET UP CURL
            {
                curl_setopt($curl, CURLOPT_FILE, $file);
                curl_setopt($curl, CURLOPT_FAILONERROR, true);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl, CURLOPT_ENCODING, '');
                curl_setopt($curl, CURLOPT_TIMEOUT, 3);

                if (!empty($_SERVER['HTTP_USER_AGENT'])) {
                    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
                }
            }

            $success = curl_exec($curl);

            if (!$success) {
                throw new RuntimeException(
                    'Spotlight failed to get the media data from Instagram: ' . curl_error($curl)
                );
            }
        } finally {
            curl_close($curl);
            fclose($file);
        }
    }

    /**
     * Attempts to retrieve the thumbnail URL for a video post.
     *
     * @since 0.4.1
     *
     * @param IgCachedMedia $media The media.
     *
     * @return string|null The URL to the thumbnail or null if could not determine the thumbnail URL.
     */
    public static function getVideoThumbnail(IgCachedMedia $media)
    {
        $permalink = trailingslashit($media->permalink);
        $response = wp_remote_get($permalink . '?__a=1');

        if (!is_wp_error($response)) {
            $data = @json_decode($response['body']);

            if ($data instanceof stdClass && isset($data->graphql->shortcode_media->display_resources)) {
                $last = end($data->graphql->shortcode_media->display_resources) ?? null;
                if ($last) {
                    return $last->src;
                }
            }
        }

        // Get the thumbnail URL from the IG page's "og:image" meta tag
        $response = wp_remote_get($permalink);
        if (!is_wp_error($response)) {
            preg_match(
                '/property="og:image"\s+content="([^"]+)"/mui',
                $response['body'],
                $matches
            );

            if (count($matches) > 1) {
                return $matches[1];
            }
        }

        return null;
    }
}
