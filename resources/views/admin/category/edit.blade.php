@extends('layouts.app')

@section('content')
<center>
<div class="container container-fluid">
   
<div class="card w-50" style="padding:12px;">
<div class="title">
    <h3>Edit category</h3>
     </div>
    <div class="body">

           <form action="{{route('category.update',$category)}}" method="post" enctype="multipart/form-data">
               @csrf
               @method('PUT')
           <div class="form-group">
               <label for="title" style="float:left;">Title</label>
               <input type="text" name="title" id=""  class="form-control {{$errors->first('title') != '' ? 'border-danger':''}}" value="{{$category->title}}">
               <span class="text-danger" style="float:left">{{$errors->first('title')}}</span>
           </div>
           <Br>
           <div class="form-group">
               <label for="desc" style="float:left;">Description</label>
             <textarea name="desc" id="" cols="30" rows="10" class="form-control">
             {{$category->desc}}
             </textarea>
             <span class="text-danger" style="float:left">{{$errors->first('desc')}}</span>
           </div>
           <div class="form-group">
           <img style="float:left" src="{{asset('storage/'.$category->image)}}" alt="" width="70"><br><br>
               <input type="file" name="image" id="" class="form-control">
               <span class="text-danger" style="float:left">{{$errors->first('image')}}</span>
           </div>
           <br>
           <input type="submit" value="Update category" style="float:left;" class="btn  btn-primary">
           </form>
       </div>
    </div>
   
</div>
</center>
@endsection