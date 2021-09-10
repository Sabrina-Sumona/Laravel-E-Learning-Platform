<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;

class MailController extends Controller
{
  public function sendEmail(Request $request){
      if($request->has('email')){
          $email= $request->get('email');
          $num = Rand(10,99);
          $str = Str::random(8);

          $details= [
              'title'=>'Send User Password',
              'body'=> 'Your new password is '. $str.'_'.$num ,
          ];

          Mail::to($email)->send(new TestMail($details));
          $success = 'true';
          // return json_encode(['success'=>true, 'response_code'=>200]);
          return view('password_mail', compact('success'));
      } else{
        $success = 'false';
          // return json_encode(['success'=>false, 'response_code'=>404]);
          return view('password_mail', compact('success'));
      }
  }
}
