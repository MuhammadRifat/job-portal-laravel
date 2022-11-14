<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\JobCategory;
use Carbon\Carbon;
use Illuminate\Support\Str;

class JobCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check_admin');
    }

    function index() {
        $data = JobCategory::latest()->simplePaginate(5);
        return view('backend.job_category.index', compact('data'));
    }

    // add category
    function insert(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:job_categories',
        ], [
            'required' => "Category name must be required",
            'unique' => "Category name must be unique",
        ]);
        JobCategory::insert([
            'category_name' => $request->category_name,
            'slug' => Str::slug($request->category_name, '-'),
            'added_by' => Auth::id(),
            'created_at' => Carbon::now(),
        ]);
        return back()->with('addStatus', 'Successfully Added.');
    }

    
    // delete category by id
    function delete($category_id)
    {
        JobCategory::find($category_id)->delete();

        return back()->with('deleteStatus', 'Successfully Deleted');
    }

    // edit category
    function edit(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:job_categories',
        ], [
            'required' => "Category name must be required",
            'unique' => "Category name must be unique",
        ]);

        JobCategory::where('id', $request->category_id)->update([
            'category_name'=> $request->category_name,
            'updated_at'=> Carbon::now(),
        ]);
        return back()->with('editStatus', 'Successfully Updated');
    }
}
