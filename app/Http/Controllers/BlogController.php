<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    function index() {
        return view('frontend.blog');
    }

    function blog_details() {
        return view('frontend.blog_details');
    }
}
