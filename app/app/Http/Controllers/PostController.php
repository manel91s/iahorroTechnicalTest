<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class PostController extends Controller
{
    private PostService $postService;

    public function __construct()
    {
        $this->postService = new PostService();
    }

    public function getPosts()
    {
        try {
            $posts = $this->postService->getPosts();
            
            return response()->json([
                'data' => 'hola'
            ], 200);

        }catch(BadRequestException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
