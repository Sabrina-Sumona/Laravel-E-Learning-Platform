<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $uName= $request->has('uname')?$request->get('uname'):'';
      $pass= $request->has('password')?$request->get('password'):'';

      $userInfo= User::where('uname','=', $uName)->where('password', '=', $pass)->first();

      if(isset($userInfo)&& $userInfo!=null){
       return redirect('/courses');
      } else{
       return redirect()->back()->with('failure', 'Username or password is not matched!!');
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // return $request->all();
      User::insert([
          'name'=>$request->has('name')? $request->get('name'):'',
          'uname'=>$request->has('uname')? $request->get('uname'):'',
          'roll'=>$request->has('roll')? $request->get('roll'):'',
          'mobile'=>$request->has('mobile')? $request->get('mobile'):'',
          'email'=>$request->has('email')? $request->get('email'):'',
          'password'=>$request->has('password')? $request->get('password'):'',
          'role'=>$request->has('role')? $request->input('role'):'',
          'rememberToken'=>$request->has('yes')? $request->get('yes'):'',
      ]);

      return redirect('/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    }
}
