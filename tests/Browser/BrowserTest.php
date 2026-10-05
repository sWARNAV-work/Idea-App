<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;

describe('Register tests', function ()
{

    it('registers a user', function ()
    {
        visit('/register')
            ->fill('name', 'Jamie Tart')
            ->fill('email', 'jamietart@email.com')
            ->fill('password', 'password2')
            ->click('Register & Log In')
            ->assertPathIs('/');

        $this->assertAuthenticated();

        expect(Auth::user())->toMatchArray([
            'name' => 'Jamie Tart',
            'email' => 'jamietart@email.com',
        ]);

    });

    it('checks the register form for wrong inputs', function ()
    {

        User::factory()->create([
            'email' => 'jamietart@email.com'
        ]);

        visit('/register')
            ->fill('name', 'ab')
            ->fill('email', 'jamietart@email.com')
            ->fill('password', 'euuu')
            ->click('Register & Log In')
            ->assertSee('The name field must be at least 3 characters.')
            ->assertSee('The password field must be at least 8 characters.')
            ->assertSee('The email has already been taken.');
    });
});

describe('Login Page Tests', function ()
{

    it('logs in a user', function ()
    {
        $user = User::factory()->create([
            // 'email' => 'email@email.com',
            'password' => 'password'
        ]);

        visit('/login')
            // ->fill('email', 'email@email.com')
            ->fill('email', $user->email)
            ->fill('password', 'password')
            ->click('@login-btn')
            ->assertPathIs('/');
            
        $this->assertAuthenticated();
    });

    it('checks the login form for wrong email input', function() 
    {
        $user = User::factory()->create([
            'password' => 'password'
        ]);

        visit('/login')
            ->fill('email', 'wrong@email.com')
            ->fill('password', 'wrongpassword')
            ->click('[data-test=login-btn]')
            ->assertSee('Please re-check your credentials.');
    });

    it('checks the user for wrong inputs', function ()
    {
        visit('/login')
            ->fill('email', 'example@email.com')
            ->fill('password', 'pp')
            ->click('@login-btn')
            ->assertSee('The password field must be at least 8 characters.');
    });

    it('checks whether the old Input is returned on wrong user input', function ()
    {
        $email = 'email@email.com';
        $pass = 'password';

        visit('/login')
            ->fill('email', $email)
            ->fill('password', $pass)
            ->click('@login-btn')
            ->assertValue('email', $email)
            ->assertValue('password', $pass);
    });
});

describe('LogOut function', function()
{
    it('checks the logout button', function ()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        visit('/')
            ->click('Log Out');

        $this->assertGuest();
    });
});