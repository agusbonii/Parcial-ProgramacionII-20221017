<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class UsersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_CrearUsuario()
    {
        $username = Str::random(12);
        $FullName = Str::random(8) . ' ' . Str::random(10);
        $password = Str::random(8);

        $responseCreate = $this->post(url()->route('registrarse'), ['username' => $username, 'FullName' => $FullName, 'password' => $password, 'password_confirmation' => $password]);

        $responseCreate->assertStatus(201);
        $responseCreate->assertSessionHas("success", trans('user.register.success'));
    }

    public function test_LoguearUsuario()
    {
        $username = "abonilla-test";
        $password = "agus1234";

        $responseCreate = $this->post(url()->route('login'), ['username' => $username, 'password' => $password]);

        var_dump($responseCreate);
        $responseCreate->assertStatus(200);
        $responseCreate->assertSessionHas("success", trans('user.register.success'));
    }
}
