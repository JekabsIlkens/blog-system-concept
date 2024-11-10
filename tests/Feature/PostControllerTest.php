<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_can_view_all_posts()
    {
        $this->actingAs($this->user);
        $response = $this->get(route('posts.index'));

        $response->assertStatus(200);
    }

    public function test_can_view_single_post()
    {
        $post = Post::factory()->create();

        $response = $this->get(route('posts.show', $post));
        
        $response->assertStatus(200);
        $response->assertSee($post->title);
    }

    public function test_can_create_post()
    {
        $this->actingAs($this->user);
        $postData = ['title' => 'Test title', 'body' => 'Blog post test body.'];

        $response = $this->post(route('posts.store'), $postData);

        $response->assertRedirect(route('posts.index'));
        $this->assertDatabaseHas('posts', $postData);
    }

    public function test_can_edit_post()
    {
        $post = Post::factory()->create(['author_id' => $this->user->id]);

        $this->actingAs($this->user);
        $response = $this->put(route('posts.update', $post), [
            'title' => 'Updated Title',
            'body' => 'Updated body content.'
        ]);

        $response->assertRedirect(route('posts.show', $post));
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'title' => 'Updated Title',
        ]);
    }

    public function test_can_delete_post()
    {
        $post = Post::factory()->create(['author_id' => $this->user->id]);

        $this->actingAs($this->user);
        $response = $this->delete(route('posts.destroy', $post));

        $response->assertRedirect(route('posts.index'));
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}
