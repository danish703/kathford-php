@extends('layouts.app')
@section('content')
<div class="container">
 <div class="row">
   <div class="col-md-8">
      Create New Company
     <br/>
      <form action="{{ route('company.store') }}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="post">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="">
        <label for="description"> Description</label>
        <textarea id="mycompany" name="description" class="form-control" rows="8" cols="80">

        </textarea>

        <script>
                      ClassicEditor
                              .create( document.querySelector( '#mycompany' ) )
                              .then( editor => {
                                      console.log( editor );
                              } )
                              .catch( error => {
                                      console.error( error );
                              } );
              </script>
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
 Edit
 @endsection
