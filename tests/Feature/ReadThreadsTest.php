<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;
    protected $thread;

    public function setUp(){
        parent::setUp();

        $this->thread = create('App\Thread');
    }

    /** @test */
    public function a_user_can_view_all_Threads()
    {
//        $thread = factory('App\Thread')->create();
//        $response = $this->get('/threads');
//        $response->assertSee($this->thread->title);
        $this->get('/threads')->assertSee($this->thread->title);

    }

    /** @test */
    public function a_user_can_read_a_single_Thread(){

//        $thread = factory('App\Thread')->create();
//        $response = $this->get('/threads/' . $this->thread->id);
//        $response->assertSee($this->thread->title);
        $this->get($this->thread->path())->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_replies_that_are_associated_with_a_thread(){

        //Given we have a thread
        //$this->thread
        //and that thread includes replies
        $reply = create('App\Reply',['thread_id' => $this->thread->id]);
        //when we visit the thread page
        $this->get($this->thread->path())->assertSee($reply->body);
        //then we should see replies
    }
}
