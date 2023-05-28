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
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    // function to show all user data
    public function index()
    {
        return User::all();
    }

    // function to login from mobile
    public function login(Request $request)
    {
        // validate data from http request
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication successful
            // Return a response
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'data' => $credentials
            ]);
        } else {
            // Authentication failed
            // Return a response
            return response()->json([

                'success' => false,
                'message' => 'Email atau password salah',
                'data' => null

            ]);
        }
    }
    // function to register from mobile
    public function register(Request $request)
    {
        // validate data from http request
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);

        // process insert data to database
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $password = $data['password'];
        $user     = User::create(['name' => $name, 'email' => $email, 'phone' => $phone, 'password' => Hash::make($password)]);
        return response()->json([

            'success' => true,
            'message' => 'Register berhasil',
            'data' => $user

        ]);
    }

    // function to show all available post
    public function post()
    {
        $post = Post::all();
        return response()->json($post);
    }
}
