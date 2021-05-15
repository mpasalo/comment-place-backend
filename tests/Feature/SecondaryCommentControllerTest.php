<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SecondaryCommentControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @covers \App\Http\Controllers\SecondaryCommentController::store
     */
    public function store()
    {
        $post = \App\Models\Post::factory()->create();

        $comment = \App\Models\Comment::factory()->create([
            'post_id'   => $post->id,
            'user_name' => 'John Doe',
            'body'      => 'This is a comment.'
        ]);

        $reply = [
            'parent_id' => $comment->id,
            'user_name' => 'John Doe',
            'comment'   => 'This is a reply.'
        ];

        $this->post(route('secondary-comment.store', $reply))
            ->assertJson([
            'message' => 'success',
        ]);

        $this->assertDatabaseHas('secondary_comments', [
            'comment_id' => $comment->id,
            'user_name'  => 'John Doe',
            'body'       => 'This is a reply.'
        ]);
    }
}
