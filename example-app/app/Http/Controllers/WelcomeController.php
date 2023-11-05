<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    //
    function index() {
        return Inertia::render(component: 'Welcome');
    }

}
