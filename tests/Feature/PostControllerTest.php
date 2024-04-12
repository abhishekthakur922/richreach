<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;

class PostControllerTest extends TestCase
{
    /**
     * Test creating a new post.
     *
     * @return void
     */
    public function testCreatePost()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/addPost', [
            'title' => 'Test Post',
            'content' => 'This is a test post.',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('success');
    }

    /**
     * Test updating a post.
     *
     * @return void
     */
    public function testUpdatePost()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->post("/editPost/{$post->id}", [
            'title' => 'Updated Title',
            'content' => 'Updated content.',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('success');
    }

    /**
     * Test deleting a post.
     *
     * @return void
     */
    public function testDeletePost()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete("/deletePost/{$post->id}");

        $response->assertStatus(302);
        $response->assertSessionHas('success');
    }
}
