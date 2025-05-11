<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\School_class;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Test;

class TestController extends Controller
{
    public function index()
    {
        //
    }

    /* Show the form for creating a new resource. */
    public function create(Request $request, $topicId = null)
    {      
        if ($topicId) {
        $topic = Topic::with(['subject', 'class'])->findOrFail($topicId);

        return view('admins.create_test', ["topic" => $topic, "readonly" => true]);
        }

        $subjects = Subject::all();
        $classes = School_class::all();
        $topics = Topic::all();

        return view('admins.create_test', [
            'readonly' => false,
            'subjects' => $subjects,
            'classes' => $classes,
            'topics' => $topics,
        ]);
    }

    /* Store a newly created resource in storage. */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'class_id' => 'required|exists:classes,id',
            'subject_id' => 'required|exists:subjects,id',
            'topic_id' => 'required|exists:topics,id',
        ]);

        $test = Test::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'topic_id' => $validated['topic_id'],
            // Можно также сохранить user_id, если нужно
        ]);
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
