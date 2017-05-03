<?php
namespace App\Http\Controllers;

use App\Customers;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use DB;
class CRUDController extends BaseController{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function delete(Request $request)
    {
        //$id = $request ->customers_id;

        $id = $request -> id;
        $data=DB::table('customers')->where(['customers_id'=>$id])->delete();
        //$data = User::find($id);
        //$response = $data -> delete();
        if($data)
            echo "Record Deleted successfully.";

    }

    public function add(Request $req)
    {
        $name = $req->input('customers_lastname');
        $email = $req->input('customers_email_address');
        $password = $req->input('customers_password');

        $checkLogin = DB::table('customers')->where(['customers_lastname'=>$name,'customers_email_address'=>$email,'customers_password'=>$password])->get();
        if(count($checkLogin)==0) {
            DB::table('customers')->insert(
                ['customers_lastname' => $name, 'customers_email_address' => $email, 'customers_password' => $password]
            );

            $data['data'] = DB::table('customers')->paginate(10);

            return view('tabellacustomers', $data);
            return back();

        }else{

           return back();

        }


    }

    public function update(Request $request)
    {

        $id = $request->edit_id;
        $name = $request->edit_name;
        $email = $request->edit_email;


        DB::table('users')
            ->where('id',$id)
            ->update
            (['name' => $name, 'email' => $email]
        );

        $data['data'] = DB::table('users')->paginate(2);

        return view('tabellacustomers', $data);
        $data -> save();
        return back()
            ->with('success','Record Updated successfully.');
    }


    public function view(Request $request)
    {
        if($request->ajax()){


            $id = $request-> id;
            $info=DB::table('customers')->where(['customers_id'=>$id])->value('customers_lastname','customers_email_address');

            //$info = User::find($id);
            //echo json_decode($info);
            return response()->json($info);
            //$strFromArr = serialize($info);
            //return $info;


        }
    }


}