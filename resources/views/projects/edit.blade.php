@extends('layouts.app')
@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-8">
       Editing Project
       <hr/>
      <form action="{{ route('project.update',[$pro->id]) }}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="{{$pro->name}}">
        <label for="description"> Description</label>
        <textarea name="description" class="form-control" rows="8" cols="80">
          {{$pro->description}}
        </textarea>
        <hr/>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
      </form>
   </div>
   <div class="col-md-4">

   </div>
 </div>
</div>
@endsection

@section('title')
 Edit Project
 @endsection
