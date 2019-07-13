@extends('layouts.app')
@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-8">

  @if($errors->any())
     <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
     </div>
  @endif


      Create New Project
     <br/>
      <form action="{{ route('project.store') }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="post">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="">
        <label for="image">Image</label> <br/>
        <input type="file" name="image"> <br/>
        <label for="description"> Description</label>
        <textarea name="description" class="form-control" rows="8" cols="80">

        </textarea>
        <input type="hidden" name="cid" value="{{$company}}">
        <hr/>
        <button type="submit" name="submit" class="btn btn-primary">Create</button>
      </form>
   </div>
   <div class="col-md-4">

   </div>
 </div>
</div>
@endsection

@section('title')
 Add Project
 @endsection
