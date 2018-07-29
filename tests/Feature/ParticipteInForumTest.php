<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipteInForumTest extends TestCase
{
    use DatabaseMigrations;
    
    /** @test */
    public function unauthanticated_users_may_not_add_replies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        
        $this->post('threads/1/replies', []);
    }
    
    /** @test */
    public function an_authenticated_user_may_participate_in_forum_threads()
    {
        // Given we have a authenticated user
        $this->be($user = factory('App\User')->create());

        // and an existing thread
        $thread = factory('App\Thread')->create();

        // when the user adds a reply to the thread
        $reply = factory('App\Reply')->make();
        $this->post($thread->path() . '/replies', $reply->toArray());

        // then the reply should be visible on the page
        $this->get($thread->path())
            ->assertSee($reply->body);
    }
}
