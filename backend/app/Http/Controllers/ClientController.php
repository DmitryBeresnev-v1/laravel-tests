<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Topic;
use App\Models\Test;
use App\Models\Answer;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('topics')->get();
            
        return view('client.subjects', ['subjects' => $subjects]);
    }

    public function show($nameSubject)
    {
        $subject = Subject::where('url_name', $nameSubject)
            ->with('topics.class', 'topics.tests.quests.answers')
            ->firstOrFail();

        $sortedTopics = $subject->topics->sortBy(function ($topic) {
            return $topic->class->id;
        });
        // Собираем уникальные классы, в которых есть темы
        $classes = $subject->topics->pluck('class')->unique('id')->sortBy('id');

        return view('client.selection_subject', ['subject' => $subject, 'sortedTopics' => $sortedTopics, 'classes' => $classes]);

    }

    public function form1()
    {
        return view('client.form1');
    }
    
    public function form2()
    {
        return view('client.form2');
    }
}