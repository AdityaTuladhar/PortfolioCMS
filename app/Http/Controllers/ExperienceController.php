<?php

namespace App\Http\Controllers;
use App\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
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
        return view('dashboard.experience',['experiences'=>Experience::all(),'count'=>$request->count]);
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
        foreach ($request->except('_method', '_token') as $input_name => $value) {
            $temp_arr = explode('-',$input_name);
            if(count($temp_arr)==2 && $temp_arr[0]=='experience'){
                $experiences = Experience::findOrFail($temp_arr[1]);
                $experiences->info = $request->input('experience-'.$temp_arr[1]);
                $experiences->date = $request->input('date-'.$temp_arr[1]);
                $experiences->save();
            }
            elseif (count($temp_arr)==3 && $temp_arr[0]=='experience') {
                $new_experience = new Experience();
                $new_experience->info = $request->input('experience-new-'.$temp_arr[2]);
                $new_experience->date = $request->input('date-new-'.$temp_arr[2]);
                $new_experience->save();
            }
        }
        return redirect()->route('experience.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experiences = Experience::findOrFail($id)->delete();

        return redirect()->route('experience.index');
    }
}
