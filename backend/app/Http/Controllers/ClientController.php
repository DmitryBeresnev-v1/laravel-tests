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
        $subject = Subject::where('url_name', $nameSubject)->firstOrFail();
        
        return view('client.form', ['subject' => $subject]);
    }
}