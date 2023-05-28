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

    public function register(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'email' => 'unique|required',
        //     'phone' => 'required',
        //     'password' => 'required'
        // ]);
        // if ($validator->fails()) {
        //     return response()->json([

        //         'success' => false,
        //         'massage' => 'ada kesalahan',
        //         'data' => $validator->errors()->first()

        //     ], 403);
        // }
        // $input = $request->all();
        // $input['password'] = Hash::make($input['password']);
        // $user = User::create($input);
        // $success['token'] = $user->createToken('auth_token')->plainTextToken;
        // $success['name'] = $user->name;
        // $success['email'] = $user->email;
        // $success['phone'] = $user->phone;

        // return response()->json([

        //     'success' => true,
        //     'massage' => 'sukses register',
        //     'data' => $success
        // ]);

        // $rules = [
        //     'name' => 'required',
        //     'email'    => 'unique:users|required',
        //     'phone'    => 'number|required',
        //     'password' => 'required',
        // ];

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);


        // $input     = $request->only('name', 'email', 'phone', 'password');
        // $validator = Validator::make($input, $credentials);
        // var_dump($credentials);
        // die();
        // if ($validator->fails()) {
        //     return response()->json(['success' => false, 'error' => $validator->messages()]);
        // }
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


    public function post()
    {
        $post = Post::all();
        return response()->json($post);
    }
}
