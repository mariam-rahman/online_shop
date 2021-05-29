@extends('layouts.app')

@section('content')

<div class="container w-75">


<div class="card  mx-auto" style="padding:12px;">
<h3>List of category</h3>
<div class="card-title">
@if(Session::get('msg'))
<p class="alert alert-success">{{Session::get('msg')}}</p>
@endif
<a href="{{route('category.create')}}" class="btn btn-success ">Add new category</a>
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
    <td>Created at</td>
    <td>Actions</td>
</tr>

</thead>
    <tbody>
    @foreach($categories as $cat)
            <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->title}}</td>
            <td>{{$cat->desc}}</td>
            <td><img src="storage/{{$cat->getImage()}}" alt="" width="70"></td>
            <td>{{$cat->getTime()}}</td>
          <td><a href="{{route('category.edit',$cat)}}" >Edit</a> 
       <form action="{{route('category.destroy',$cat)}}" method="post">
          @csrf
          @method('DELETE')
          <input type="submit" value="delete">
          </form>
          </td>
            </tr>
    @endforeach
     </tbody>
</table>
       </div>
    </div>
   
</div>
@endsection
