<?php

namespace RebelCode\Spotlight\Instagram\Engine\Aggregation;

use RebelCode\Iris\Aggregation\ItemAggregator;
use RebelCode\Iris\Aggregation\ItemFeed;
use RebelCode\Iris\Aggregation\ItemTransformer;
use RebelCode\Iris\Item;
use RebelCode\Spotlight\Instagram\Engine\MediaChild;
use RebelCode\Spotlight\Instagram\Engine\MediaComment;
use RebelCode\Spotlight\Instagram\Engine\MediaItem;

/**
 * Transforms items into media data arrays.
 *
 * This is used to transform the results from an {@link ItemAggregator} and prepares the items to be in the correct
 * format for REST API responses.
 *
 * @since 0.5
 */
class MediaTransformer implements ItemTransformer
{
    /**
     * @inheritDoc
     *
     * @since 0.5
     */
    public function transform(Item $item, ItemFeed $feed)
    {
        $children = $item->data['children'] ?? [];
        foreach ($children as $idx => $child) {
            $children[$idx] = [
                'id' => $child[MediaChild::MEDIA_ID],
                'type' => $child[MediaChild::MEDIA_TYPE],
                'url' => $child[MediaChild::MEDIA_URL],
                'permalink' => $child[MediaChild::PERMALINK],
            ];
        }

        $comments = $item->data['comments'] ?? [];
        foreach ($comments as $idx => $comment) {
            $comments[$idx] = [
                'id' => $comment[MediaComment::ID],
                'username' => $comment[MediaComment::USERNAME],
                'text' => $comment[MediaComment::TEXT],
                'timestamp' => $comment[MediaComment::TIMESTAMP],
                'likeCount' => $comment[MediaComment::LIKES_COUNT],
            ];
        }

        return [
            'id' => $item->data[MediaItem::MEDIA_ID],
            'username' => $item->data[MediaItem::USERNAME],
            'caption' => $item->data[MediaItem::CAPTION],
            'timestamp' => $item->data[MediaItem::TIMESTAMP],
            'type' => $item->data[MediaItem::MEDIA_TYPE],
            'url' => $item->data[MediaItem::MEDIA_URL],
            'permalink' => $item->data[MediaItem::PERMALINK],
            'thumbnail' => $item->data[MediaItem::THUMBNAIL_URL],
            'thumbnails' => $item->data[MediaItem::THUMBNAILS],
            'likesCount' => $item->data[MediaItem::LIKES_COUNT],
            'commentsCount' => $item->data[MediaItem::COMMENTS_COUNT],
            'comments' => $comments,
            'children' => $children,
            'source' => [
                'type' => $item->source->type,
                'name' => $item->source->data['name'],
            ],
        ];
    }
}
