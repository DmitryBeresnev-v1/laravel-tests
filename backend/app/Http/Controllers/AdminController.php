<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; // Необходим для работы с Request
use Illuminate\Support\Facades\Auth;

use App\Models\School_class;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Test;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        //
    }

    /* Display the specified resource. */
    public function show(Request $request)
    {
        $topic = Topic::all();

        return view('admins.all_topics', ["topic" => $topic]);
    }
}
