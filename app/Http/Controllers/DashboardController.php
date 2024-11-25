<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // $posts = Post::where('user_id', Auth::id())->get();
        $posts = Auth::user()->posts()->latest()->paginate(6);
        // dd($posts);

        return view('users.dashboard', ['posts' => $posts]);
    }

    public function userPosts(User $user)
    {
        $userPosts = $user->posts()->latest()->paginate(6);
        return view('users.posts', ['posts' => $userPosts, 'user' => $user]);
    }
}
