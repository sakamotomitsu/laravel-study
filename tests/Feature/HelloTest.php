<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class HelloTest extends TestCase
{
    use DatabaseMigrations;

    public function testHello()
    {
        /*$this->assertTrue(true);

        $arr = [];
        $this -> assertEmpty($arr);

        $msg = "hello";
        $this -> assertEquals('hello', $msg);

        $n = random_int(0, 100);
        $this -> assertLessThan(100, $n);
        */

        $this -> assertTrue(true);

        $response = $this -> get('/');
        $response -> assertStatus(200);

        $response = $this -> get('/hello');
        $response -> assertStatus(302);

        $user = factory(User::class) -> create();
        $response = $this -> actingAs($user) -> get('/hello');
        $response -> assertStatus(200);

        $response = $this -> get('/no_route');
        $response -> assertStatus(404);
    }
}
