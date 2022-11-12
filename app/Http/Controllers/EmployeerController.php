<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employers;
use App\Models\User;
use Carbon\Carbon;

class EmployeerController extends Controller
{
    function index()
    {
        $data = Employers::latest()->simplepaginate(5);
        return view('backend.employeer', compact('data'));
    }

    function insert(Request $request)
    {
        $request->validate([
            'company_name' => 'required|unique:employers',
            'employer_email' => 'required|email|unique:employers',
            'employer_designation' => 'required',
            'employer_name' => 'required',
            'employer_password' => ['required', 'string', 'min:8'],
        ]);

        User::insert([
            'name' => $request->employer_name,
            'email' => $request->employer_email,
            'role' => 'employer',
            'password' => $request->employer_password,
            'created_at' => Carbon::now(),
        ]);

        Employers::insert([
            'employer_name' => $request->employer_name,
            'employer_designation' => $request->employer_designation,
            'employer_email' => $request->employer_email,
            'company_name' => $request->company_name,
            'created_at' => Carbon::now(),
        ]);

        return back()->with('addStatus', 'Successfully Added.');
    }

    // delete employerinformation
    function delete($employer_id) {
        User::find($employer_id)->delete();
        Employers::find($employer_id)->delete();

        return back()->with('deleteStatus', 'Successfully Deleted');
    }
}
