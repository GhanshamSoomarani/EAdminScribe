<?php
namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function list(Request $request)
    {
        $facultyId = $request->query('faculty_id');
        if ($facultyId) {
            return Department::where('faculty_id', $facultyId)->get();
        }
        return response()->json([]);
    }
}
