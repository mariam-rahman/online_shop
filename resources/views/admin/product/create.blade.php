@extends('layouts.app')

@section('content')
<center>
<div class="container container-fluid">
   
<div class="card w-50" style="padding:12px;">
<div class="title">
    <h3>Add a new category</h3>
     </div>
    <div class="body">

           <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
               @csrf
           <div class="form-group">
               <label for="title" style="float:left;">Name</label>
               <input type="text" name="name" id=""  class="form-control {{$errors->first('title') != '' ? 'border-danger':''}}">
               <span class="text-danger" style="float:left">{{$errors->first('name')}}</span>
           </div>
           <Br>
           <div class="form-group">
               <label for="desc" style="float:left;">Description</label>
             <textarea name="desc" id="" cols="30" rows="10" class="form-control"></textarea>
             <span class="text-danger" style="float:left">{{$errors->first('desc')}}</span>
           </div>
           <div class="form-group">
               <label for="title" style="float:left;">Price</label>
               <input type="text" name="price" id=""  class="form-control {{$errors->first('price') != '' ? 'border-danger':''}}">
               <span class="text-danger" style="float:left">{{$errors->first('price')}}</span>
           </div>

           <div class="form-group">
           <select name="category_id" id="" class="form-control">
           <option value="" >Select</option>
           @foreach($categories as $category)
           <option value="{{$category->id}}">{{$category->title}}</option>
           @endforeach
           </select>
           </div>
           <div class="form-group">
               <label for="" style="float:left;">Image</label>
               <input type="file" name="image" id="" class="form-control">
               <span class="text-danger" style="float:left">{{$errors->first('image')}}</span>
           </div>
           <br>
           <input type="submit" value="Add product" style="float:left;" class="btn  btn-primary">
           </form>
       </div>
    </div>
   
</div>
</center>
@endsection