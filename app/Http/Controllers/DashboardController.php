<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        
    }
}
