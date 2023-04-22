<?php

namespace App\Http\Controllers;
use App\SliderInfo;
use Illuminate\Http\Request;

class SliderController extends Controller
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
        return view('dashboard.slider',["sliders"=>SliderInfo::all(),'count' => $request->count]);
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
            if(count($temp_arr)==2){
                $sliders = SliderInfo::findOrFail($temp_arr[1]);
                if($temp_arr[0]=='source'){
                    $name = $request->file('source-'.$temp_arr[1])->getClientOriginalName();
                    $request->file('source-'.$temp_arr[1])->storeAs('public/images',$name);
                    $sliders->source = $name;
                }
                $sliders->alternate = $request->input('alternative-'.$temp_arr[1]);
                $sliders->save();
            }
            elseif (count($temp_arr)==3 && $temp_arr[0]=='source') {
                $name = $request->file('source-new-'.$temp_arr[2])->getClientOriginalName();
                $request->file('source-new-'.$temp_arr[2])->storeAs('public/images',$name);
                $new_slider = new SliderInfo();
                $new_slider->source = $name;
                $new_slider->alternate = $request->input('alternative-new-'.$temp_arr[2]);
                $new_slider->save();
            }
        }
        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sliders = SliderInfo::findOrFail($id)->delete();

        return redirect()->route('slider.index');
    }
}
