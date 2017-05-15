<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DB;

class loginController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function login(Request $req)
    {
        $email = $req->input('email');
        $password = $req->input('password');

        $checkLogin = DB::table('users')->where(['email'=>$email,'password'=>$password])->get();
        $data['data'] = DB::table('users')->get();

        if(count($checkLogin)  >0)
        {

            $data['data'] = DB::table('customers')->paginate(10);

            return view('tabellacustomers', $data);
        }
        else {
            echo "Login Faield Wrong Data Passed";
        }
    }
}
