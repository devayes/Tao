<?php

/**
 *
 */
if (!function_exists('tao')) {
    function tao(?int $chapter = null, ?string $format = 'array'): string
    {
        return app('tao')->getChapter($chapter, $format);
    }
}
