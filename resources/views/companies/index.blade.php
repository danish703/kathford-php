@extends('layouts.app')
@section('content')
<div class="row">
   <div class="col-md-6 offset-md-3">
     <a href="/company/create" class="btn btn-primary" style="float:right;">Create New Company </a>
     <h3>Company List</h3>
    <ul class="list-group">
      @foreach($companies as $cmp)
      <li class="list-group-item"><a href="/company/{{$cmp->id}}">{{ $cmp->name }}</a></li>
      @endforeach
    </ul>
</div>
</div>
@endsection

@section('title')
 Company list
 @endsection
