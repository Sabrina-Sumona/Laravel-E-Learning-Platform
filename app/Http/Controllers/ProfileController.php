<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Notification;
use App\Notifications\ProfileUpdateNotification;

class ProfileController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('profile');
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
    //
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
  public function edit(Request $request)
  {
    $request->validate([
      'image' => 'mimes:jpg,png,jpeg,gif,svg|max:2048',
    ]);
    if($request->hasFile('image')){
      $file= $request->file('image');
      $extension= $file->getClientOriginalExtension();
      $fileName= 'image_' . Auth::user()->id . '.' . $extension;
      $location= '/images/user_'. Auth::user()->id. '/';

      $file->move(public_path().$location, $fileName);
      $imageFinal= $location.$fileName;

      User::where('id', auth()->user()->id)->update([
        'image'=> $imageFinal
      ]);
    }
    return redirect()->back();
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
    $fieldName= $request->get('fld_name') ?? '';
    $fieldVal= $request->get('fld_value') ?? '';

    if(isset($fieldVal) && $fieldVal!=null) {
      User::where('id', $id)->update([
        $fieldName => $fieldVal
      ]);

      $user = auth::user();
      Notification::send($user, new ProfileUpdateNotification($user));

      return back()->with('success', 'Profile Updated Successfully!!');
    } else {
      return back()->with('failure', 'Invalid Input!!');
    }
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
