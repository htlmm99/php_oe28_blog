<?php

namespace App\Helpers;

class Process
{
    static public function detectImageInContent($posts)
    {
        foreach ($posts as $key => $post) {
            $content = $post->content;
            if (strpos($content, '<img')) {
                $contentWithoutFirstImg = explode('<img', $content)[0] .
                    explode('/>', explode('<img', $content)[1])[1];
                $post->content = $contentWithoutFirstImg;
                $posts[$key] = $post;
            }
        }

        return $posts;
    }

    static public function addDivToContent($content)
    {
        return "<div>$content</div>";
    }
}
