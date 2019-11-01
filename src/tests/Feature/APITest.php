<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\Request;
use App\User;

class APITest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAccountLogin()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ])->json('POST', '/api/v1/account/login', [
            'account' => [
                'email' => 'johnbeck@email.com',
                'password' => 'passwordone'
            ]
        ]);

        $response->assertStatus(200)->assertJson(['account' => true]);
    }

    public function testClassroomTeacher()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer aCSZkvGkec5jNerGqDALIw0JFGWliGFUP65HW25ynggfWVyYDLJ7JFd9TuOM'
        ])->json('GET', '/api/v1/1/classroom');

        $response->assertStatus(200)->assertJson(['classes' => true]);
    }

    public function testClassroomStudent()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer aCSZkvGkec5jNerGqDALIw0JFGWliGFUP65HW25ynggfWVyYDLJ7JFd9TuOM'
        ])->json('GET', '/api/v1/5/classroom');

        $response->assertStatus(200)->assertJson(['classes' => true]);
    }

    public function testClassroomDetails()
    {
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer aCSZkvGkec5jNerGqDALIw0JFGWliGFUP65HW25ynggfWVyYDLJ7JFd9TuOM'
        ])->json('GET', '/api/v1/1/classroom/1');

        $response->assertStatus(200)->assertJson(['classroom' => true]);
    }

    public function testClassroomBenchmark(){
        $response = $this->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer aCSZkvGkec5jNerGqDALIw0JFGWliGFUP65HW25ynggfWVyYDLJ7JFd9TuOM'
        ])->json('GET', '/api/v1/1/classroom/1/p');

        $response->assertStatus(200)->assertJson(['modules' => true]);
    }
}
