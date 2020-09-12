<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        return Auth::check()
            ? Inertia::render('Dashboard')
            : redirect()->to('login');
    }
}
