<?php

use App\Department;
use App\Faculty;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        // Faculty of Architecture & Civil Engineering
        $facultyArchitectureCivil = Faculty::where('name', 'Faculty of Architecture & Civil Engineering')->first();
        Department::create([
            'name' => 'Architecture',
            'department_code' => 'AR',
            'faculty_id' => $facultyArchitectureCivil->id
        ]);
        Department::create([
            'name' => 'City & Regional Planning',
            'department_code' => 'CRP',
            'faculty_id' => $facultyArchitectureCivil->id
        ]);
        Department::create([
            'name' => 'Civil Engineering',
            'department_code' => 'CE',
            'faculty_id' => $facultyArchitectureCivil->id
        ]);
        Department::create([
            'name' => 'Environmental Engineering',
            'department_code' => 'EE',
            'faculty_id' => $facultyArchitectureCivil->id
        ]);
        Department::create([
            'name' => 'Institute of Water Resources Engineering & Management',
            'department_code' => 'IWR',
            'faculty_id' => $facultyArchitectureCivil->id
        ]);

        // Faculty of Electrical, Electronic & Computer Engineering
        $facultyElectrical = Faculty::where('name', 'Faculty of Electrical, Electronic & Computer Engineering')->first();
        Department::create([
            'name' => 'Institute of Information & Communication Technologies',
            'department_code' => 'IICT',
            'faculty_id' => $facultyElectrical->id
        ]);
        Department::create([
            'name' => 'Electrical Engineering',
            'department_code' => 'EL',
            'faculty_id' => $facultyElectrical->id
        ]);
        Department::create([
            'name' => 'Computer Systems Engineering',
            'department_code' => 'CS',
            'faculty_id' => $facultyElectrical->id
        ]);
        Department::create([
            'name' => 'Software Engineering',
            'department_code' => 'SW',
            'faculty_id' => $facultyElectrical->id
        ]);
        Department::create([
            'name' => 'Electronic Engineering',
            'department_code' => 'ES',
            'faculty_id' => $facultyElectrical->id
        ]);
        Department::create([
            'name' => 'Telecommunication Engineering',
            'department_code' => 'TL',
            'faculty_id' => $facultyElectrical->id
        ]);
        Department::create([
            'name' => 'Bio-Medical Engineering',
            'department_code' => 'BM',
            'faculty_id' => $facultyElectrical->id
        ]);

        // Faculty of Mechanical, Process & Earth Engineering
        $facultyMechanical = Faculty::where('name', 'Faculty of Mechanical, Process & Earth Engineering')->first();
        Department::create([
            'name' => 'Industrial Engineering & Management',
            'department_code' => 'IN',
            'faculty_id' => $facultyMechanical->id
        ]);
        Department::create([
            'name' => 'Mechanical Engineering',
            'department_code' => 'ME',
            'faculty_id' => $facultyMechanical->id
        ]);
        Department::create([
            'name' => 'Mechatronic Engineering',
            'department_code' => 'MTE',
            'faculty_id' => $facultyMechanical->id
        ]);
        Department::create([
            'name' => 'Metallurgy & Materials Engineering',
            'department_code' => 'MT',
            'faculty_id' => $facultyMechanical->id
        ]);
        Department::create([
            'name' => 'Mining Engineering',
            'department_code' => 'MN',
            'faculty_id' => $facultyMechanical->id
        ]);
        Department::create([
            'name' => 'Petroleum & Natural Gas Engineering',
            'department_code' => 'PG',
            'faculty_id' => $facultyMechanical->id
        ]);
        Department::create([
            'name' => 'Textile Engineering',
            'department_code' => 'TE',
            'faculty_id' => $facultyMechanical->id
        ]);
        Department::create([
            'name' => 'Chemical Engineering',
            'department_code' => 'CH',
            'faculty_id' => $facultyMechanical->id
        ]);

        // Faculty of Sciences Technology & Humanities
        $facultySciences = Faculty::where('name', 'Faculty of Sciences Technology & Humanities')->first();
        Department::create([
            'name' => 'Basic Sciences & Related Studies',
            'department_code' => 'BSRS',
            'faculty_id' => $facultySciences->id
        ]);
        Department::create([
            'name' => 'Centre of English Language & Linguistics',
            'department_code' => 'CELL',
            'faculty_id' => $facultySciences->id
        ]);
        Department::create([
            'name' => 'Mehran University Institute of Science, Technology & Development',
            'department_code' => 'MUIST',
            'faculty_id' => $facultySciences->id
        ]);
    }
}
