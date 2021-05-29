@extends('layouts.app')

@section('content')

<div class="container w-75">


<div class="card  mx-auto" style="padding:12px;">
<h3>List of sliders</h3>
<div class="card-title">
@if(Session::get('msg'))
<p class="alert alert-success">{{Session::get('msg')}}</p>
@endif
<a href="{{route('slider.create')}}" class="btn btn-success ">Add new slide</a>
</div>

<div class="title table-striped">
    
     </div>
    <div class="body">
<table class="table">
<thead class="table-dark">
<tr>
    <td>#</td>
    <td>Title</td>
    <td>Description</td>
    <td>Image</td>
    <td>Actions</td>
</tr>

</thead>
    <tbody>
    @foreach($sliders as $slider)
            <tr>
            <td>{{$slider->id}}</td>
            <td>{{$slider->title}}</td>
            <td>{{$slider->desc}}</td>
            <td><img src="images/sliders/{{$slider->image}}" alt="" width="70"></td>
            <td>
            <div class="row">
            <div class="col-3">
            <form action="{{route('slider.destroy',$slider)}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete" class="btn btn-danger btn-sm">
            </form>
            </div>
          
             <div class="col-3">
             <a href="{{route('slider.edit',$slider)}}" class="btn btn-secondary btn-sm">Edit</a>
            </div>
         
            </div>
         
            </td>
            </tr>
    @endforeach
     </tbody>
</table>
       </div>
    </div>
   
</div>
@endsection
