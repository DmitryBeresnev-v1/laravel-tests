<?php

namespace App\Http\Controllers;
use App\Models\School_classes;
use App\Models\Topic;

class TopicController extends Controller
{
    public function create()
    {
        return view('admins.create_topic');
    }

    public function view()
    {
        return view('subjects.dashboard');
    }

    
    
}
