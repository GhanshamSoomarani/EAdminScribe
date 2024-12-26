<?php
namespace App\Http\Controllers;

use App\Faculty;
use App\Department;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function list()
    {
        return Faculty::all();
    }
}

class DepartmentController extends Controller
{
    public function list(Request $request)
    {
        $facultyId = $request->query('faculty_id');
        return Department::where('faculty_id', $facultyId)->get();
    }
}
