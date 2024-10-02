<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// php artisan make:controller SecurityController

class SecurityController extends Controller
{
    public function admin(Request $request)
    {
        return '<h1>Admin Page</h1>';
    }

    public function login()
    {
        return '<h1>Login Page</h1>';
    }
}
