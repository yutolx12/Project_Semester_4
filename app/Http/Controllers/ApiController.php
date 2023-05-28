<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function post()
    {
        $post = Post::all();
        return response()->json($post);
    }
}
