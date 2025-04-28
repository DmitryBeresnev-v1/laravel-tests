<?php

namespace App\Http\Controllers;
use App\Models\School_classes;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function createSubject()
    {
        $classes=School_classes::all();
        $subject=Subject::all();
        return view('admins.create_subject', ["classes"=>$classes, "subject"=>$subject]);
    }

    public function view()
    {
        return view('subjects.dashboard');
    }

    
    
}
