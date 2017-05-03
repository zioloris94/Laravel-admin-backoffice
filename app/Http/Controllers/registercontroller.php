<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DB;

class registercontroller extends BaseController{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function register(Request $req)
    {
        $name = $req->input('name');
        $email = $req->input('email');
        $password = $req->input('password');

        DB::table('users')->insert(
            ['name' => $name, 'email' => $email, 'password' => $password ]
        );
        return view ('accesso');

    }
}