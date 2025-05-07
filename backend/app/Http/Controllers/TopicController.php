<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; // Необходим для работы с Request

use App\Models\School_class;
use App\Models\Subject;
use App\Models\Topic;

class TopicController extends Controller
{
    public function view()
    {
        return view('admins.view_topic');
    }
    public function index()
    {
        return view('admins.user_topics');
    }

    /* Show the form for creating a new resource. */
    public function create()
    {
        $class=School_class::all();
        $subject=Subject::all();
        return view('admins.create_topic', ["class"=>$class, "subject"=>$subject]);
    }

    /* Store a newly created resource in storage. */
    public function store(Request $request)
    {
        //
    }

    /* Display the specified resource. */
    public function show(string $id)
    {
        //
    }

    /* Show the form for editing the specified resource. */
    public function edit(string $id)
    {
        //
    }

    /* Update the specified resource in storage. */
    public function update(Request $request, string $id)
    {
        //
    }

    /* Remove the specified resource from storage. */
    public function destroy(string $id)
    {
        //
    }
    
    
}
