<?php

namespace App\Controllers;

use App\Framework\DB;
use App\Framework\Request;
use App\Framework\Session;

use App\Controllers\Controller as App;

class AdminController {
    public function __construct() {
        App::middleware('Admin', ['loginPage','login','logout']);
    }
    public static function me() {
        // 
    }
    public function loginPage() {
        return view('admin.login');
    }
    public function login(Request $req) {
        $username = $req->username;
        $password = md5($req->password);

        $loggingIn = DB::table('admins')
                    ->select('username', 'password')
                    ->where([
                        ['username', '=', $username],
                        ['password', '=', $password]
                    ])
                    ->first();

        if ($loggingIn == "") {
            return redirect("admin/login", [
                'message' => "Username atau Password salah"
            ]);
        }

        Session::set('admin', $loggingIn);
        redirect('admin/dashboard');
    }
    public function logout() {
        Session::unset('admin');
        return redirect('login');
    }
    public function dashboard() {
        return view('admin.dashboard');
    }
    public function users() {
        $users = DB::table('users')->select()->orderBy('created_at', 'DESC')->paginate(15);

        return view('admin.users', [
            'users' => $users
        ]);
    }
    public function userDetail($id) {
        $user = DB::table('users')->select()->where('id', '=', $id)
        ->with('educations', [
            'user_id' => 'id'
        ])
        ->with('skills', [
            'user_id' => 'id'
        ])
        ->with('experiences', [
            'user_id' => 'id'
        ])
        ->with('contacts', [
            'user_id' => 'id'
        ])
        ->first();

        // echo json_encode($user);
        return view('admin.userDetail', [
            'user' => $user
        ]);
    }
}