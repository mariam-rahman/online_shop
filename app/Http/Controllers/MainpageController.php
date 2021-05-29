<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class MainpageController extends Controller
{
    public function mainpage(){
        $sliders = Slider::all();

        return view('mainpage',compact('sliders'));
    }
}
