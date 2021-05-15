<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     * @covers \App\Http\Controllers\CommentController::store
     */
    public function store()
    {
        $post = \App\Models\Post::factory()->create();
        $comment = [
            'post_id'   => $post->id,
            'user_name' => 'John Doe',
            'comment'      => 'This is a text.'
        ];

        $this->post(route('comment.store', $comment))
            ->assertJson([
            'message' => 'success',
        ]);

        $this->assertDatabaseHas('comments', [
            'post_id'   => $post->id,
            'user_name' => 'John Doe',
            'body'      => 'This is a text.'
        ]);
    }
}
