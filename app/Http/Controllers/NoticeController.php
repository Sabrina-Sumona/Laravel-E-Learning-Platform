<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
  public function index(){
    $allNotices= Notice::query()->orderBy('id')->get();

    $notices= array();
    foreach($allNotices as $notice){
      $notices[]= array(
        'type'=> $notice->type,
        'data'=> $notice->data,
      );
    }

    return view('notices', compact('notices'));
  }
}
