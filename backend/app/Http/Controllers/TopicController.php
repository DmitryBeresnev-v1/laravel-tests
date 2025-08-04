<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; // Необходим для работы с Request
use Illuminate\Support\Facades\Auth;

use App\Models\School_class;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Test;
use App\Models\User;

class TopicController extends Controller
{
    public function index(Request $request)
    {   
        $user = User::with(['topics', 'tests', 'tests.quests'])->find(Auth::user()->id);

        return view('admins.user_topics', ['user' =>$user]);
    }

    /* Show the form for creating a new resource. */
    public function create()
    {
        $class = School_class::all();
        $subject = Subject::all();
        return view('admins.create_topic', ["class" => $class, "subject" => $subject]);
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
            'topic_content' => 'required',
        ]);

       $topicId = Topic::create([
           'title' => $validated['topic_name'],
           'description' => $validated['topic_description'],
           'content' => $validated['topic_content'],
           'class_id' => $validated['class_select'],
           'subject_id' => $validated['subject_select'],
        //    'average_time' => 0;
        //    'difficulty' => 0;
           'created_by' => Auth::user()->id,
           
       ]);
       
       return redirect('/admin/topic/' . $topicId -> id);
    //    return redirect()->back()->with('success', 'Record inserted successfully');
  
    }

    /* Display the specified resource. */
    public function show($topicId)
    {
        $topic = Topic::with(['subject', 'class', 'user', 'tests', 'tests.quests'])->findOrFail($topicId);
        $hasTest = $topic->tests->isEmpty();

        return view('admins.view_topic', ["topic"=>$topic, 'hasTest'=>$hasTest]);
    }

    /* Show the form for editing the specified resource. */
    public function edit($topicId)
    {
        $topic = Topic::with(['subject', 'class', 'user', 'tests', 'tests.quests'])->findOrFail($topicId);
        $hasTest = $topic->tests->isEmpty();
        $class = School_class::all();
        $subject = Subject::all();

        return view('admins.edit_topic', ["topic"=>$topic, 'hasTest'=>$hasTest, "class" => $class, "subject" => $subject]);
    }

    /* Update the specified resource in storage. */
    public function update(Request $request, $topicId)
    {
        //        dd($request);
        $validated = $request->validate([
            'topic_name' => 'required|string|max:255',
            'subject_select' => 'required|integer|min:1',
            'class_select' => 'required|integer|min:1',
            'topic_description' => 'required',
            'topic_content' => 'required',
        ]);

        $topic = Topic::findOrFail($topicId);

        $topic->update([
           'title' => $validated['topic_name'],
           'description' => $validated['topic_description'],
           'content' => $validated['topic_content'],
           'class_id' => $validated['class_select'],
           'subject_id' => $validated['subject_select'],
        //    'average_time' => 0;
        //    'difficulty' => 0;
           
       ]);
       
       return redirect()->route('topic.show', ['topicId' => $topic->id])->with('success', 'Тема успешно обновлена');
    //    return redirect()->back()->with('success', 'Record inserted successfully');
  
    }

    /* Remove the specified resource from storage. */
    public function destroy($id)
    {
        $topic = Topic::findOrFail($id); // Найдёт или выдаст 404
        $topic -> delete(); // Удаление

        return redirect()->back()->with('success', 'Пользователь успешно удалён.');
    }
    
    
}
