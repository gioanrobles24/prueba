<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getusersdata(){
      /* return User::all();*/
      $users = DB::table('users')->select('id','name','cargo','cedula','email');
     /* return  $users;*/
    }

    public function index()
    {

        /*$all_users =User::all();*/

        return view('home');    }
}
