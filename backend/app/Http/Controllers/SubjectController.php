<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Необходим для работы с Request
use Illuminate\Support\Str; // Необходим для транскрибации

use App\Models\School_classes;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        //
    }

    /* Show the form for creating a new resource. */
    public function create()
    {
        $subject=Subject::all();
        return view('admins.create_subject', ["subject"=>$subject]);
    }

    /* Store a newly created resource in storage. */
    public function store(Request $request)
    {
        //dd($request);
         $request->validate([
             'subject_name'=> 'required',
             'subject_description'=> 'required',
         ]);

          $subject_name = $request->subject_name;
          $subject_description = $request->subject_description;
        
        Subject::create([
            "name"=>$subject_name,
            "description"=>$subject_description,
            'url_name' => Str::slug($request->input('subject_name')),
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
