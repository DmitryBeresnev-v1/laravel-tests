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
        $topics = Topic::all();
        return view('client.form', compact('topics'));
    }
}