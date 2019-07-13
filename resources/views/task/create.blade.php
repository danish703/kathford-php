@extends('layouts.app')
@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-8">
      Create New Task
     <br/>
      <form action="{{route('task.store')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="post">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="">
        <label for="day">Days</label>
        <input type="number" name="day" class="form-control">

        <label for="hours">Hours</label>
        <input type="number" name="hours" class="form-control" value="">

        <input type="hidden" name="cid" value="{{$project->company_id}}">
        <input type="hidden" name="pid" value="{{$project->id}}">
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
 Add Task
 @endsection
