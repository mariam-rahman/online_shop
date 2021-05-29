<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{


    public function test($param = null){
     $title = "Some titles";
     return view('welcome',compact('param','title'));
        return view('welcome',
    [
        'title'=>'Laravel',
        'param'=>$param,
        'info'=>' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit aspernatur numquam nihil eligendi autem illum fugiat sapiente soluta iste culpa, aliquam consectetur eius distinctio praesentium quidem error voluptatibus magnam dignissimos.'
    ]
    );
    }
   
}
