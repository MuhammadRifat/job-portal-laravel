<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    function index()
    {
        return view('frontend.job_list');
    }

    function job_details()
    {
        return view('frontend.job_details');
    }
}
