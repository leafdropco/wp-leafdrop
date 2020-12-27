<?php

namespace RebelCode\Spotlight\Instagram\PostTypes;

use DateTime;
use RebelCode\Spotlight\Instagram\IgApi\IgComment;
use RebelCode\Spotlight\Instagram\MediaStore\IgCachedMedia;
use RebelCode\Spotlight\Instagram\MediaStore\MediaSource;
use RebelCode\Spotlight\Instagram\MediaStore\Processors\MediaDownloader;
use RebelCode\Spotlight\Instagram\Utils\Arrays;
use RebelCode\Spotlight\Instagram\Wp\PostType;
use WP_Post;

/**
 * The post type for media.
 *
 * This class extends the {@link PostType} class only as a formality. The primary purpose of this class is to house
 * the meta key constants and functionality for dealing with posts of the media custom post type.
 *
 * @since 0.1
 */
class MediaPostType extends PostType
{
    const MEDIA_ID = '_sli_media_id';
    const USERNAME = '_sli_media_username';
    const TIMESTAMP = '_sli_timestamp';
    const CAPTION = '_sli_caption';
    const TYPE = '_sli_media_type';
    const URL = '_sli_media_url';
    const PERMALINK = '_sli_permalink';
    const THUMBNAIL_URL = '_sli_thumbnail_url';
    const THUMBNAILS = '_sli_thumbnails';
    const LIKES_COUNT = '_sli_likes_count';
    const COMMENTS_COUNT = '_sli_comments_count';
    const COMMENTS = '_sli_comments';
    const CHILDREN = '_sli_children';
    const LAST_REQUESTED = '_sli_last_requested';
    const IS_STORY = '_sli_is_story';
    const SOURCE_NAME = '_sli_source_name';
    const SOURCE_TYPE = '_sli_source_type';

    /**
     * Converts a WordPress post into an IG media instance.
     *
     * @since 0.1
     *
     * @param WP_Post $post
     *
     * @return IgCachedMedia
     */
    public static function fromWpPost(WP_Post $post) : IgCachedMedia
    {
        return IgCachedMedia::create([
            'post' => $post,
            'id' => $post->{static::MEDIA_ID},
            'username' => $post->{static::USERNAME},
            'timestamp' => $post->{static::TIMESTAMP},
            'caption' => $post->{static::CAPTION},
            'media_type' => $post->{static::TYPE},
            'media_url' => $post->{static::URL},
            'permalink' => $post->{static::PERMALINK},
            'thumbnail_url' => $post->{static::THUMBNAIL_URL},
            'thumbnails' => $post->{static::THUMBNAILS},
            'likes_count' => $post->{static::LIKES_COUNT},
            'comments_count' => $post->{static::COMMENTS_COUNT},
            'comments' => array_map([IgComment::class, 'create'], $post->{static::COMMENTS}),
            'children' => $post->{static::CHILDREN},
            'last_requested' => $post->{static::LAST_REQUESTED},
            'source' => MediaSource::create([
                'name' => $post->{static::SOURCE_NAME},
                'type' => $post->{static::SOURCE_TYPE},
            ]),
        ]);
    }

    /**
     * Converts an IG media instance into a WordPress post.
     *
     * @since 0.1
     *
     * @param IgCachedMedia $media
     *
     * @return array
     */
    public static function toWpPost(IgCachedMedia $media) : array
    {
        return [
            'post_title' => $media->getCaption(),
            'post_status' => 'publish',
            'meta_input' => [
                static::MEDIA_ID => $media->id,
                static::USERNAME => $media->username,
                static::TIMESTAMP => $media->timestamp ? $media->timestamp->format(DateTime::ISO8601) : null,
                static::CAPTION => $media->caption,
                static::TYPE => $media->type,
                static::URL => $media->url,
                static::PERMALINK => $media->permalink,
                static::THUMBNAIL_URL => $media->thumbnail,
                static::THUMBNAILS => $media->thumbnails,
                static::LIKES_COUNT => $media->likesCount,
                static::COMMENTS_COUNT => $media->commentsCount,
                static::COMMENTS => array_map([static::class, 'commentToArray'], $media->comments),
                static::CHILDREN => $media->children,
                static::LAST_REQUESTED => $media->lastRequested,
                static::SOURCE_NAME => $media->source->name,
                static::SOURCE_TYPE => $media->source->type,
            ],
        ];
    }

    /**
     * Converts a comment into an array for storing in post meta.
     *
     * @since 0.1
     *
     * @param IgComment $comment The comment instance.
     *
     * @return array
     */
    public static function commentToArray(IgComment $comment)
    {
        return [
            'id' => $comment->id,
            'username' => $comment->username,
            'text' => $comment->text,
            'timestamp' => $comment->timestamp->format(DateTime::ISO8601),
            'like_count' => $comment->likeCount,
        ];
    }

    /**
     * Deletes all media associated with a particular source.
     *
     * @since 0.1
     *
     * @param MediaSource $source The source for which to delete media.
     * @param PostType    $cpt    The media post type.
     *
     * @return int The number of deleted media.
     */
    public static function deleteForSource(MediaSource $source, PostType $cpt)
    {
        $media = $cpt->query([
            'meta_query' => [
                'relation' => 'AND',
                [
                    'key' => MediaPostType::SOURCE_NAME,
                    'value' => $source->name,
                ],
                [
                    'key' => MediaPostType::SOURCE_TYPE,
                    'value' => $source->type,
                ],
            ],
        ]);

        $count = 0;
        Arrays::each($media, function (WP_Post $post) use (&$count) {
            $result = static::deleteMedia($post);

            if (!empty($result)) {
                $count++;
            }
        });

        return $count;
    }

    /**
     * Deletes a media post and all associated data.
     *
     * @since 0.4.1
     *
     * @param WP_Post $post The post for the media to delete.
     *
     * @return bool True on success, false on failure.
     */
    public static function deleteMedia(WP_Post $post) : bool
    {
        $success = wp_delete_post($post->ID, true);

        $thumbnails = MediaDownloader::getAllThumbnails($post->{static::MEDIA_ID});

        foreach ($thumbnails as $thumbnail) {
            if (file_exists($thumbnail)) {
                @unlink($thumbnail);
            }
        }

        return $success !== false;
    }

    /**
     * Deletes all media posts and their associated meta data from the database.
     *
     * @since 0.2
     *
     * @return bool|int False on failure, the number of deleted media posts and meta entries on success.
     */
    public static function deleteAll()
    {
        global $wpdb;

        $query = sprintf(
            'DELETE post, meta
            FROM %s as post
            LEFT JOIN %s as meta on post.ID = meta.post_id
            WHERE post.post_type = \'sl-insta-media\'',
            $wpdb->posts,
            $wpdb->postmeta
        );

        MediaDownloader::clearThumbnailsDir();

        return $wpdb->query($query);
    }
}
