<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register()
    {
     $this->followingRedirects();

      $user = [
      'name' => 'Sabrina Naorin',
      'uname' => 'sns',
      'roll' => 171122334,
      'email' => 'testmail@test.com',
      'mobile' => '+01911223344',
      'role' => 'std',
      'password' => 'Password%%1234',
    ];

    $response = $this->post('/register', $user);

    $response ->assertStatus(200);
    }
}
