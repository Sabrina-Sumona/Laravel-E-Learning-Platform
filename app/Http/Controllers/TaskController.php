<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
  public function index(){
    $allPosts= Post::query()->orderBy('id')->get();

    $posts= array();
    foreach($allPosts as $post){
      $posts[]= array(
        'id'=> $post->id,
        'status'=> $post->status?? '',
        'photo'=> $post->photo?? '',
        'likes'=> count(json_decode($post->likes)) ?? 0,
        'comments'=> $post->comments ?? 0,
        'user'=> User::find($post->user_id),
        'created_at'=> date('d.m.Y, g:i a', strtotime($post->created_at)),
      );
    }

    return view('tasks', compact('posts'));
  }
}
