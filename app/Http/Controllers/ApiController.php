<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication successful
            // Redirect or return a response as needed
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'data' => $credentials
            ]);
        } else {
            // Authentication failed
            // Redirect or return a response as needed
            return response()->json([

                'success' => false,
                'message' => 'Email atau password salah',
                'data' => null

            ]);
        }
    }


    public function post()
    {
        $post = Post::all();
        return response()->json($post);
    }
}
