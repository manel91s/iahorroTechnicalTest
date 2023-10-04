<?php

declare(strict_types=1);

namespace App\Services;
use App\Models\Post;


class PostService
{
    public function getPosts(): array
    {
        $posts = Post::all();

        $arrayPosts = [];
        foreach ($posts as $post) {
            $arrayPosts[] = [
                1 => $post->id,
                2 => $post->body,
                3 => $post->user
            ];
        }

        return $arrayPosts;
    }
}
