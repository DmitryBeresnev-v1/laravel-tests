<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Topic;
use App\Models\Test;
use App\Models\Answer;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index($nameSubject)
    {
        $subject = Subject::where('url_name', $nameSubject)
            ->with('topics.tests.quests.answers')
            ->firstOrFail();
        
        $data = [
            'name' => $subject->name,
            'topics' => $subject->topics->map(function ($topic) {
                return [
                    'title' => $topic->title,
                    'tests' => $topic->tests->map(function ($test) {
                        return [
                            'title' => $test->title,
                            'quests' => $test->quests->map(function ($quest) {
                                return [
                                    'question' => $quest->question,
                                    'type' => $quest->type,
                                    'answers' => $quest->answers->map(function ($answer) {
                                        return [
                                            'text' => $answer->answer,
                                            'is_correct' => $answer->is_correct,
                                        ];
                                    })
                                ];
                            })
                        ];
                    })
                ];
            })  
        ];
        
        //dd($data);
        return view('client.form', ['subject' => $subject, 'data' => $data]);
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