<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User; // Ensure the namespace matches your User model
use App\Faculty;
use App\Department;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'profile_picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'signature_picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'faculty' => ['nullable', 'exists:faculties,id'],
            'department' => ['nullable', 'exists:departments,id'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // Handle file uploads
        $profilePicturePath = null;
        if (isset($data['profile_picture']) && $data['profile_picture'] instanceof \Illuminate\Http\UploadedFile) {
            $file = $data['profile_picture'];
            $profilePicturePath = $file->storeAs('public/profile_pictures', time() . '-' . $file->getClientOriginalName());
            $profilePicturePath = basename($profilePicturePath); // Store only the file name
        }

        $signaturePicturePath = null;
        if (isset($data['signature_picture']) && $data['signature_picture'] instanceof \Illuminate\Http\UploadedFile) {
            $file = $data['signature_picture'];
            $signaturePicturePath = $file->storeAs('public/signature_pictures', time() . '-' . $file->getClientOriginalName());
            $signaturePicturePath = basename($signaturePicturePath); // Store only the file name
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'profile_picture' => $profilePicturePath,
            'signature_picture' => $signaturePicturePath,
            'faculty_id' => $data['faculty'] ?? null, // Use null if 'faculty' key is missing
            'department_id' => $data['department'] ?? null, // Use null if 'department' key is missing
        ]);
    }

    /**
     * Override the registration method to handle file uploads.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Validate the request
        $this->validator($request->all())->validate();

        // Create the user with the request data
        $this->create($request->all());

        return redirect($this->redirectTo);
    }

    /**
     * Get a list of faculties.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFaculties()
    {
        $faculties = Faculty::all();
        return response()->json($faculties);
    }

    /**
     * Get a list of departments based on the selected faculty.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDepartments(Request $request)
    {
        $facultyId = $request->input('faculty_id');
        $departments = Department::where('faculty_id', $facultyId)->get();
        return response()->json($departments);
    }
}
