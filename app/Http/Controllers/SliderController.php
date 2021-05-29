<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sliders = Slider::all();
        return view('admin/slider/index',
        [
            'sliders'=>$sliders
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin/slider/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  $request->validate([
            'title'=>'required',
            'desc'=>'nullable',
            'image'=>'required|image|mimes:png,jpg,jpeg,svg|max:1024'
        ]);
    $imageName = time().'.'.$request->image->extension();

    $request->image->move(public_path('images/sliders'),$imageName);

    $data = Slider::create($request->except(['image'])); 
    $data->image = $imageName;
    $data->update();
    return redirect(route('slider.index'))->with('msg','Data has been stored successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
      return view('admin/slider/edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
    
        $slider->update($request->except(['image']));
        return redirect(route('slider.index'))->with('msg','Record updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect(route('slider.index'))->with('msg','Record deleted successfully');
    }
}
