<?php

namespace RebelCode\Spotlight\Instagram\Engine;

class MediaItem
{
    // FROM INSTAGRAM API
    // -----------------------
    const MEDIA_ID = 'media_id';
    const CAPTION = 'caption';
    const USERNAME = 'username';
    const TIMESTAMP = 'timestamp';
    const MEDIA_TYPE = 'media_type';
    const MEDIA_URL = 'media_url';
    const PERMALINK = 'permalink';
    const THUMBNAIL_URL = 'thumbnail_url';
    const LIKES_COUNT = 'like_count';
    const COMMENTS_COUNT = 'comments_count';
    const COMMENTS = 'comments';
    const CHILDREN = 'children';
    // CUSTOM FIELDS
    // -----------------------
    const POST = 'post';
    const IS_STORY = 'is_story';
    const LAST_REQUESTED = 'last_requested';
    const THUMBNAILS = 'thumbnails';
    const SOURCE_TYPE = 'source_type';
    const SOURCE_NAME = 'source_name';
}
