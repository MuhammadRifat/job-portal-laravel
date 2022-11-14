<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class EmployeerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_admin');
    }

    function index()
    {
        $data = User::where('role', 'employer')->latest()->paginate(5);
        return view('backend.employeer', compact('data'));
    }

    function insert(Request $request)
    {
        $request->validate([
            // 'company_name' => 'required|unique:employers',
            'email' => 'required|email|unique:users',
            // 'employer_designation' => 'required',
            'name' => 'required',
            'password' => ['required', 'string', 'min:8'],
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'employer',
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);

        // Employers::insert([
        //     'employer_name' => $request->employer_name,
        //     'employer_designation' => $request->employer_designation,
        //     'employer_email' => $request->employer_email,
        //     'company_name' => $request->company_name,
        //     'created_at' => Carbon::now(),
        // ]);

        return back()->with('addStatus', 'Successfully Added.');
    }

    // delete employerinformation
    function delete($employer_id) {
        User::find($employer_id)->delete();
        // Employers::find($employer_id)->delete();

        return back()->with('deleteStatus', 'Successfully Deleted');
    }
}
