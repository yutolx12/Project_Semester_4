<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Lending;
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
            $id = $request->only(['email']);
            $userprofile = User::where('email', $id)->first();
            // print($userprofile);
            // $name = $userprofile->name;
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil',
                'data' => $userprofile
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
            'email' => 'required|email|unique:users',
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

    public function peminjaman(Request $request)
    {
        // validate data from http request
        $data = $request->validate([
            'user_id' => 'required',
            'lending_date' => 'required',
            'return_date' => 'required'
        ]);

        // $data2 = $request->validate([
        //     'post_id' => 'required',
        //     'lending_date' => 'required',
        //     'return_date' => 'required'
        // ]);

        // process insert data to database
        $user_id = $data['user_id'];
        $lending_date = $data['lending_date'];
        $return_date = $data['return_date'];
        $peminjaman     = Lending::create(['user_id' => $user_id, 'lending_date' => $lending_date, 'return_date' => $return_date]);
        return response()->json([

            'success' => true,
            'message' => 'Peminjaman berhasil',
            'data' => $peminjaman

        ]);
    }

    public function updateProfile(Request $request)
    {
        // $id = $_GET['id'];
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'name' => 'required',
            'phone' => 'required',
            // 'password' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
                'data' => $validator->errors()->first(),
            ], 404);
        }

        $id = $request->only(['email']);
        $input = $request->only(['name', 'phone']);
        // if ($request->has('password')) {
        //     bcrypt($request->input('password'));
        // }
        User::where('email', $id['email'])->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Sukses update pengguna',
            'data' => $input,
        ]);
    }

    // $data = $request->validate([
    //     'id' => 'required',
    //     'name' => 'required',
    //     'email' => 'required',
    //     'phone' => 'required',
    //     'password' => 'required',
    // ]);

    // // $id = $data['id'];
    // $name = $data['name'];
    // $email = $data['email'];
    // $phone = $data['phone'];
    // $password = $data['password'];

    // // $input = $request->all();
    // $update = User::where('id', $data['id'])->update(['name' => $name, 'email' => $email, 'phone' => $phone, 'password' => Hash::make($password)]);

    // return response()->json([
    //     'success' => true,
    //     'message' => 'Sukses update pengguna',
    //     'data' => $update,
    // ]);
    // }
    // }
}
