<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\School_class;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Quest;
use App\Models\Answer;
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
        //dd($request);
        $validated = $request->validate([
            'test_title' => 'required|string|max:255',
            'test_description' => 'nullable|string',
            'topic_id' => 'required|exists:topics,id',
            // 'questions' => 'required|array|min:1',
            // 'questions.*.text' => 'required|string',
            // 'questions.*.answer_type' => 'required|in:single,multiple,text',
            // 'questions.*.answers' => 'required|array',
        ]);

        // Создаем тест
        DB::beginTransaction();
        try{
            $test = Test::create([
                'title' => $validated['test_title'],
                'description' => $validated['test_description'] ?? null,
                'topic_id' => $validated['topic_id'],
                'created_by' => Auth::user()->id,
            ]);

            //Создаем вопросы и ответы
            foreach ($request->questions as $questionData) {
                $question = Quest::create([
                    'test_id' => $test->id,
                    'question' => $questionData['text'],
                    'type' => $questionData['answer_type'],                
                ]);

                foreach ($questionData['answers'] as $key=>$answer) {
                    $is_correct = false;
                    
                    if ($questionData['answer_type']==0)
                    {   
                        if ($questionData['correct']==$key) 
                            $is_correct = true;
                    } else if ($questionData['answer_type']==1)
                    {   
                        $is_correct = isset($answer['correct']);
                    } else
                    {
                        $is_correct = true;
                    }
                    $answer = Answer::create([
                        'question_id' => $question->id,
                        'answer' => $answer['text'],
                        'is_correct' => $is_correct, 
                    ]);
                }
            }
            DB::commit();
                if ($request->route_topic){
                    return redirect('/admin/topic/' . $validated['topic_id']);
                }
                return redirect()->back()->with('success', 'Record inserted successfully');
        }
        catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('errors', 'fuck');
        }
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
