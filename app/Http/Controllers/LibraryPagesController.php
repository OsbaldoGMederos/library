<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibraryPagesController extends Controller
{
    
    public function index() {
        return view('index');
    }
}
