<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
  public function index(){
     $categories = Category::all();
     return view('admin/category/index',compact('categories'));
  }

  public function create(){
      return view('admin/category/create');
  }

  public function store(Request $request){


     $request->validate([
      'title'=>'required',
     ]);
     $image_path = "";
     if($request->image != '')
     $image_path = $request->image->store('images','public');

     $cat = new Category();
     $cat->title = $request->title;
     $cat->desc = $request->desc;
     $cat->image = $image_path;
     $cat->save();
     return redirect('/category');
  }

  public function edit($id){
    
       $category = Category::find($id);
      return view('admin/category/edit',compact('category'));
  }

  public function update($id,Request $request){
    $category = Category::find($id);
    if($request->image != '')
    {
      $old_image_path = 'storage/'.$category->image;
      if(File::exists($old_image_path))
      {
        File::delete($old_image_path);
      }
      $new_image_path = $request->image->store('images','public');
      $category->title = $request->title;
      $category->desc = $request->desc;
      $category->image = $new_image_path;
   
    }
  else 
  {
  $category->title = $request->title;
  $category->desc = $request->desc;
  }
  $category->update();
    return redirect('/category');
  }

  public function destroy($id){
      $cat = Category::find($id);
      $cat->delete();
      return redirect('/category');
  }
}
