<?php

namespace Tests\Feature;

use App\Services\PostService;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostServiceTest extends TestCase
{
    use RefreshDatabase;

    private PostService $postService;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(DatabaseSeeder::class);

        $this->postService = new PostService();
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetPosts()
    {
        $posts = $this->postService->getPosts();

        $this->assertIsArray($posts);
        $this->assertCount(11, $posts);
    }

    public function testDoSomething()
    {
        $mockedObject = $this->getMockBuilder(PostService::class)
            ->disableOriginalConstructor()
            ->getMock();

        $mockedObject->expects($this->once())
            ->method('getPosts')
            ->willReturn([
                [
                    'id' => 1,
                    'body' => 'Post1',
                ],
                [
                    'id' => 2,
                    'body' => 'Post1',
                ],
                [
                    'id' => 3,
                    'body' => 'Post1',
                ],
                [
                    'id' => 4,
                    'body' => 'Post1',
                ],
            ]);
        $result = $mockedObject->getPosts();

        $this->assertEquals($result[0]['id'], 1);
        $this->assertIsArray($result);
        $this->assertCount(4, $result);
    }
}
