<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
        public function index(){
        $std=Student::all();
        return view('student',compact('std'));
    }
}
