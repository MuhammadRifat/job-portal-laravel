<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;

class HomeController extends Controller
{
    public function index() {
        $job_categories = JobCategory::offset(0)->limit(8)->get();
        return view('frontend.home', compact('job_categories'));
    }
}
