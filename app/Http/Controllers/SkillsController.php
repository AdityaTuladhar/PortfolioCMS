<?php

namespace App\Http\Controllers;

use App\Skills;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!isset($request->count)){
            $request->count=0;
        }
        return view('dashboard.skills', ['skills' => Skills::all(),'count'=>$request->count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        foreach ($request->except('_method', '_token') as $input_name => $value) {
            $temp_arr = explode('-',$input_name);
            if(count($temp_arr)==2 && $temp_arr[0]=='skill'){
                $skills = Skills::findOrFail($temp_arr[1]);
                $skills->languages = $request->input('skill-'.$temp_arr[1]);
                $skills->rating = $request->input('rating-'.$temp_arr[1]);
                $skills->save();
            }
            elseif (count($temp_arr)==3 && $temp_arr[0]=='skill') {
                $new_skill = new Skills();
                $new_skill->languages = $request->input('skill-new-'.$temp_arr[2]);
                $new_skill->rating = $request->input('rating-new-'.$temp_arr[2]);
                $new_skill->save();
            }
        }
        return redirect()->route('skills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skills = Skills::findOrFail($id)->delete();

        return redirect()->route('skills.index');
    }
}
