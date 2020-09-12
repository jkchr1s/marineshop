<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        // require authentication
        $this->middleware('auth');
    }

    public function index()
    {
        return Inertia::render('Dashboard');
    }
}
