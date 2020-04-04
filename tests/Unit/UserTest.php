<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    public function testExist()
    {
        $this->assertDatabaseHas('users', [
            'email' => 'test@evertec.com'
        ]);
    }

    public function testLogin()
    {
        $credentials = [
            'email' => 'test@evertec.com',
            'password' => 'secret'
        ];
        $this->assertCredentials($credentials, $guard = null);
    }

    public function testLoginFailed()
    {
        $credentials = [
            'email' => 'test@evertec.com',
            'password' => '12345678'
        ];
        $this->assertInvalidCredentials($credentials, $guard = null);
    }

}
