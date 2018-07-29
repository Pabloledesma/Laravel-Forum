<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function guest_cannot_see_the_create_thread_page()
    {
        $this->withExceptionHandling();

        $this->get('/threads/create')
            ->assertRedirect('/login');

        $this->post('/threads')
            ->assertRedirect('/login');
    }
    
    /** @test */
    public function unauthanticated_users_may_not_add_replies()
    {
        $this->withExceptionHandling()
            ->post('threads/some-channel/1/replies', [])
            ->assertRedirect('/login');
    }
    
    
    /** @test */
    public function an_authenticated_user_can_create_new_forum_threads()
    {
        // Given we have a authenticated user
        $this->signIn();

        // and an existing thread
        $thread = create('App\Thread');
        $reply = make('App\Reply');

        // when the user adds a reply to the thread
        $this->post($thread->path() . '/replies', $reply->toArray());

        // then the reply should be visible on the page
        $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
