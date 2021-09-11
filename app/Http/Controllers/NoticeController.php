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
        'owner_image'=> $notice->owner_image,
        'created_at'=> $notice->created_at,
      );
    }

    return view('notices', compact('notices'));
  }
}
