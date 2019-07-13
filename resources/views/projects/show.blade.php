@extends('layouts.app')
@section('content')
   <div class="jumbotron">
      <div class="container">
        <div class="row">
        <div class="col-md-8">
          <h3>{{$project->name}} </h3>
          <p>
              {{$project->description}}
          </p>
        </div>
        <div class="col-md-4">
          <a href="/task/create/{{$project->id}}" class="btn btn-primary">Add Task</a>
        </div>
      </div>
      </div>
   </div>
   <div class="row">
     <div class="container">
       <table class="table">
         <th>Task Name</th>
         <th>Day</th>
         <th>Hours</th>
         <th>Action</th>
         @foreach($project->task as $t)
          <tr>
            <td>{{$t->name}}</td>
            <td>{{$t->day}}</td>
            <td>{{$t->hours}}</td>
            <td>Edit | Delete </td>
          </tr>
         @endforeach
       </table>

     </div>

   </div>
@endsection

@section('title')
 Company list
 @endsection
