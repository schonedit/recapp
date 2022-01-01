<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUser;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PublicController extends Controller
{
    public function createUser()
    {
        return view('create.createuser');
    }
    public function saveUser(CreateUser $request)
    {
        $user = new User;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Successful registration.');
    }
}
