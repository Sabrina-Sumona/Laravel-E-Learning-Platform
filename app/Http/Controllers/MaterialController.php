<?php

namespace App\Http\Controllers;

use App\Models\Material;
namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
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
  * @param  \App\Models\Material  $material
  * @return \Illuminate\Http\Response
  */
  public function show(Material $material)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Material  $material
  * @return \Illuminate\Http\Response
  */
  public function edit(Material $material)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Material  $material
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Material $material)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Material  $material
  * @return \Illuminate\Http\Response
  */
  public function destroy(Material $material)
  {
    //
  }

  public function showMaterials(Request $request)
  {
    $course = $request->has('course')?$request->get('course'):'';
    $cCodes = explode(':',$course,2);
    $cCode = $cCodes[0];
    // dd($cCode);
    $materials = DB::table('materials')->select(['class_date', 'drive_link'])->where('course_code','=', $cCode)->get();
    // dd($materials);
    return view('course_materials', compact('materials','cCode'));
  }
}
