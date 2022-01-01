<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUser;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateUser;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showUsers()
    {
        $users = User::paginate(3);
        return view('includes.users', compact('users'));
    }
    public function viewUser($id)
    {
        $user = User::findOrFail($id);

        return view('includes.viewuser', compact('user'));
    }
    public function updateUser(UpdateUser $request, $id)
    {
        $user = User::findOrFail($id);

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'User has been updated successfully.');
    }
    public function deleteUser(Request $request, $id)
    {
        $request->validate([
                    'userid' => 'required',
        ]);

        if ($id == $request->userid) {

            $user = User::findOrFail($id);
            $user->delete();
            return redirect('/users');
        }
        
        return redirect()->back()->with('danger', 'User cannot be deleted.');
    }
}
