<?php

namespace Tests\Feature;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $post;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->post = Post::factory()->create(['author_id' => $this->user->id]);
    }

    public function test_can_create_comment()
    {
        $this->actingAs($this->user);

        $commentData = [
            'comment' => 'Test comment from the author',
            'user_id' => $this->user->id,
            'post_id' => $this->post->id,
        ];

        $response = $this->post(route('comments.store', $this->post), $commentData);

        $response->assertRedirect(route('posts.show', $this->post));
        $this->assertDatabaseHas('comments', $commentData);
    }

    public function test_can_delete_comment()
    {
        $comment = Comment::factory()->create(['user_id' => $this->user->id, 'post_id' => $this->post->id]);

        $this->actingAs($this->user);
        $response = $this->delete(route('comments.destroy', $comment));

        $response->assertRedirect(url()->previous());
        $this->assertDatabaseMissing('comments', ['id' => $comment->id]);
    }
}
