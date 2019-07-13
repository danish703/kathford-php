@extends('layouts.app')
@section('content')
<div class="jumbotron">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h1>{{$company->name}}</h1>
      <p>{{$company->description}}</p>
      </div>
    <div class="col-md-4">
       <ul>
         <li><a href="/project/create/{{$company->id}}">Add project</a></li>
         <li><a href="/company/{{$company->id}}/edit">Edit Company</a></li>
         <li>
           <a href="#" onclick="
              var conf = confirm('Are you sure you want to delete ?');
              if(conf){
                event.preventDefault();
                document.getElementById('delete_form').submit();
              }
              ">Delete</a>

           <form method="post" id="delete_form" action="{{route('company.destroy',[$company->id])}}">
             <input type="hidden" name="_method" value="delete">
             {{csrf_field()}}
           </form>

         </li>
       </ul>
    </div>
  </div>
  </div>
</div>

  <div class="container">
    <div class="row">
  @foreach($company->project as $p)
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <div class="caption">
        <h3><a href="/project/{{$p->id}}">{{$p->name}}</a></h3>
        <img src="{{ asset('image/'.$p->image) }}" alt="" style="height:200px;width:auto;">
        <p><?php echo str_limit($p->description,150); ?></p>
        <p><a href="/project/{{$p->id}}/edit" class="btn btn-primary" role="button">Edit</a>
        <a href="#" onclick="
            var areyousure = confirm('are you sure you want to delete ?');
            if(areyousure){
              event.preventDefault();
              document.getElementById('delete_project_form').submit();
            }

        " class="btn btn-default" role="button">Delete
          <form method="post" id="delete_project_form" action="{{route('project.destroy',[$p->id])}}">
            <input type="hidden" name="_method" value="delete">
            {{csrf_field()}}
          </form>

        </a></p>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>

<div class="container">
  <h5>Comments</h5>
  @foreach($comment as $cp)
    <div class="row">
       <div class="col-md-12">
         <h6>User</h6>
         <p style="display:block;">{{$cp->comment}}</p>
         <hr/>
       </div>
    </div>
  @endforeach
</div>




<div class="container">
  <h5>Add Comment</h5>
  <hr>
  <div class="row">
      <form action="{{route('comments.store')}}" method="post">
        <input type="hidden" name="_method" value="post">
        {{csrf_field()}}
        <input type="hidden" name="commentable_type" value="Company">
        <input type="hidden" name="commentable_id" value="{{$company->id}}">
        <textarea name="comment" class="form-control" rows="8" cols="80"></textarea>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
  </div>

</div>

@endsection
@section('title')
 {{$company->name}}
 @endsection
