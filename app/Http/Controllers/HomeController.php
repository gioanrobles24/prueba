<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DataTables;
use DB;
use Illuminate\Support\Facades\Hash;
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
    public function index()
    {

        $all_users =User::all();

        return view('home')->with('all_users', $all_users);

         }
    
    public function adduser(Request $Request) {
         User::create([
            'name' => $Request['name'],
            'cedula' => $Request['cedula'],
            'cargo' => $Request['cargo'],
            'email' => $Request['email'],
            'password' => Hash::make($Request['password']),
        ]);
             $all_users =User::all();
         return view('home')->with('all_users', $all_users);

    }
      public function edit($id)
    {
      
        $user= User::find($id);
        return view('edit',compact('user'));
    }
 
   
    public function update(Request $request, $id)    {
        //
        $this->validate($request,[ 'name'=>'required', 'cargo'=>'required', 'cedula'=>'required', 'email'=>'required', 'password'=>'required']);
 
        User::find($id)->update($request->all());
        return redirect()->route('home')->with('success','Registro actualizado satisfactoriamente');
 
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         User::find($id)->delete();
        return redirect()->route('home')->with('success','Registro eliminado satisfactoriamente');
    }


}
