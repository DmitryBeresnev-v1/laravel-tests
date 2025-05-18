<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Test;
use App\Models\Answer;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {   
        $users = User::with(['topics', 'tests'])->get();

        return view('users.index', ['users' =>$users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function edit(string $id)
    {
        return view('users.edit');
    }

    public function store(Request $request)
    {
        $request->validate([
             'user_name' => 'required|string|max:255',
             'user_login' => 'required|string|max:255',
             'user_password' => 'required|string|max:255',
        ]);

        User::create([
            'name' => $request->user_name,
            'login' => $request->user_login,
            'password' => $request->user_password,
            'email' => $request->user_name . '@a.a'
        ]);
        
        return redirect()->back()->with('success', 'Record inserted successfully');

    }

    public function destroy($id)
    {
        //dd($id);
        $user = User::findOrFail($id); // Найдёт или выдаст 404
        if ($user->id == '1')
            return redirect()->back()->with('errors', 'Пользователь ек может быть удален.');
        else
            $user -> delete(); // Удаление пользователя

        return redirect()->back()->with('success', 'Пользователь успешно удалён.');

    }
}
