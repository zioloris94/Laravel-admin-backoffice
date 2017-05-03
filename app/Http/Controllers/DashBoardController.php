<?php
namespace App\Http\Controllers;

class DashBoardController extends Controller {


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('dashboard');
    }

}