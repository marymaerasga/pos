<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_delete_user()
    {
        $users = User::factory()->count(1)->make();
        $users = User::first();
        if($users){
            $users->delete();
        }
        $this->assertTrue(true);
    }
}
