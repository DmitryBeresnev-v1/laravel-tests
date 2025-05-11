<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; // Необходим для работы с Request

use App\Models\School_class;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Test;

class TopicController extends Controller
{
    public function view($topicId)
    {
        $topic = Topic::with(['subject', 'class', 'user', 'tests', 'tests.questions'])->findOrFail($topicId);
        $hasTest = $topic->tests->isEmpty();

        //return view('admin.topic.view', compact('topic', 'hasTest'));
        return view('admins.view_topic', ["topic"=>$topic, 'hasTest'=>$hasTest]);
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
//        dd($request);
        $validated = $request->validate([
            'topic_name' => 'required|string|max:255',
            'subject_select' => 'required|integer|min:1',
            'class_select' => 'required|integer|min:1',
            'topic_description' => 'required',
        ]);

       Topic::create([
           'title' => $validated['topic_name'],
           'description' => $validated['topic_description'],
           'class_id' => $validated['class_select'],
           'subject_id' => $validated['subject_select'],
        //    'average_time' => 0;
        //    'difficulty' => 0;
           'created_by' => '1', //Auth::user()->id,
           
       ]);
       
       return redirect()->back()->with('success', 'Record inserted successfully');
  
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
