<?php

namespace App\Http\Controllers;

use App\Customers;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getDataCustomers()
    {


        $data['data'] = DB::table('customers')->paginate(10);

        return view('tabellacustomers', $data);

    }

    public function getDataAgenti()
    {

        $data['data'] = DB::table('mesa_agenti')->paginate(2);
        return view('tabellaagenti', $data);
    }

    public function searchcustomers(Request $request){

            $output="";
            $customers=DB::table('customers')->where('customers_lastname','LIKE','%'.$request->search.'%')
                                         ->orWhere('customers_email_address','LIKE','%'.$request->search.'%')->get();
             if($customers){
                 foreach ($customers as $key =>$customer){
                     $output='<tr>'.
                             '<td>'.$customer->customers_lastname.'</td>'.
                              '<td>'.$customer->customers_email_address.'</td>'.
                             '</tr>';
                 }
                 return Response($output);
             }else{
                 return Response()->json(['no'=>'Not Found']);
             }




    }
    public function searchagenti(Request $request){

        $output="";
        $customers=DB::table('mesa_agenti')->where('cod_agente','LIKE','%'.$request->search.'%')
                                           ->orWhere('des_ragsoc','LIKE','%'.$request->search.'%')->get();

        if($customers){
            foreach ($customers as $key =>$customer){

                $output='<tr>'.
                    '<td>'.$customer->cod_agente.'</td>'.
                    '<td>'.$customer->des_ragsoc.'</td>'.
                    '</tr>';
            }
            return Response($output);
        }else{
            return Response()->json(['no'=>'Not Found']);
        }




    }

    public function nameasc(){

        $data['data']=DB::table('customers')->orderBy('customers_lastname','ASC')->paginate(10);
        return view('tabellacustomers',$data);

    }
    public function namedesc(){

        $data['data']=DB::table('customers')->orderBy('customers_lastname','DESC')->paginate(10);
        return view('tabellacustomers',$data);

    }

    public function emailasc(){

        $data['data']=DB::table('customers')->orderBy('customers_email_address','ASC')->paginate(10);
        return view('tabellacustomers',$data);

    }
    public function emaildesc(){

        $data['data']=DB::table('customers')->orderBy('customers_email_address','DESC')->paginate(10);
        return view('tabellacustomers',$data);

    }
    public function agenteasc(){

       /* $data['data']=DB::table('customers')->orderBy('customers_email_address','ASC')->paginate(10);
        return view('tabellacustomers',$data);*/

    }
    public function agentedesc(){

       /* $data['data']=DB::table('customers')->orderBy('customers_email_address','ASC')->paginate(10);
        return view('tabellacustomers',$data);*/

    }


}



