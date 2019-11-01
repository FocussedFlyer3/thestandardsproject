<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use App\User;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }

    public function testLoginUser()
    {
        $response = $this->get('/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function testArrayData(){
        $data = [];
        $this->assertEmpty($data);
    }

    public function testDatabaseHasEmail(){
        $this->assertDatabaseHas('users', [
            'email' => 'four@email.com'
        ]);
    }

    public function testDatabaseHasSchool(){
        $response = $this->assertDatabaseHas('classes', ['school' => 'PS101']);
    }

    public function testDoesNotShowView(){
        $response = $this->get('/rail');
        $response->assertStatus(404);
    }
}
