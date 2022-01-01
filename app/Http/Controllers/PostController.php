<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Savings;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdatePost;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function showPosts()
    {
        $posts = Post::paginate(4);
        return view('posts.index', compact('posts'));
    }
    public function showUserPosts()
    {
        $user = User::find(Auth::user()->id);
        $posts = $user->posts()->get();
        return view('posts.viewusersposts')->with(array("user" => $user, "posts" => $posts));
    }
    public function createPost()
    {
        return view('posts.createpost');
    }
    public function storePost(Request $request)
    {
        $post = new Post;
        $post -> title = $request->input('title');
        $post -> content = $request->input('content');
        if ($request->hasfile('profile_image')) 
        {
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/posts/', $filename);
            $post->profile_image = $filename;
        }
        $post -> user_id = Auth::user()->id;
        $post->save();
        return redirect()->back()->with('success', 'Post added.');
    }
    public function showRecipe($id)
    {
        $post = Post::findOrFail($id);
        $user = User::find($post->user_id);
        return view('posts.viewrecipe', compact('post', 'user'));
    }
    public function deleteUserPosts($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back();
    }
    public function updatePosts($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.updatepost', compact('post'));
    }
    public function updateUserPosts(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $post->title = $request->title;
        $post->content = $request->input('content');
        $post->save();

        return redirect()->back()->with('success', 'Post has been updated successfully.');
    }
    public function createSavings(Request $request, $id)
    {
        $saveitem = new Savings();
        $saveitem -> category = $request->input('category');
        $saveitem -> post_id = $id;
        $saveitem -> user_id = Auth::user()->id;
        $saveitem->save();
        return redirect()->back()->with('success', 'Saved.');
    }
    public function viewSavings()
    {
        $user = User::find(Auth::user()->id);
        $id = $user->id;
        $posts = DB::table('savings')
            ->join('posts', 'savings.post_id', '=', 'posts.id')
            ->select('posts.*', 'savings.id AS saveditemid', 'savings.category AS scategory')
            ->where('savings.user_id', $id)
            ->get();
        return view('savings.viewsavings')->with(array("posts" => $posts));
    }
    public function deleteSavings($id)
    {
        $saveditem = Savings::findOrFail($id);
        $saveditem->delete();
        return redirect()->back();
    }
}
