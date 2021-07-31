<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->has('submit') && $request->has('uname') && $request->has('roll') && $request->has('mobile') && $request->has('email')){
           $user= User::where('uname', $request->get('uname'))->first();
           if(isset($user) && $user!=null){
               return redirect()->back()->with('error', 'Username already taken!');
           }
           $user= User::where('roll', $request->get('roll'))->first();
           if(isset($user) && $user!=null){
               return redirect()->back()->with('error', 'Roll already taken!');
           }
           $user= User::where('mobile', $request->get('mobile'))->first();
           if(isset($user) && $user!=null){
               return redirect()->back()->with('error', 'Mobile already taken!');
           }
           $user= User::where('email', $request->get('email'))->first();
           if(isset($user) && $user!=null){
               return redirect()->back()->with('error', 'Email already taken!');
           }
        }
        return $next($request);
    }
}
