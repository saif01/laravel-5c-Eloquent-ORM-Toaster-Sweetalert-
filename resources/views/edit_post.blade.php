@extends('layouts.app')
@section('content')

<div class="container">

	<form action="{{url('update-post/'.$saif->id)}}" method="post">
        @csrf


    <div class="form-group">
    <label >Title</label>
    <input type="text" name="title" class="form-control" value="{{ $saif->title }}">
    </div>


  <div class="form-group">
    <label >Author</label>
    <input type="text" name="author" class="form-control" value="{{ $saif->author }}">
    
  </div>
  <div class="form-group">
    <label >Tags</label>
    <input type="text" name="tag" class="form-control"  value="{{ $saif->tag }}">
    </div>
    <div class="form-group">
    <label > Description</label>
    <textarea type="text" name="description" class="form-control" >{{ $saif->description }}</textarea>
    
    </div>


     
      <div class="modal-footer">
       
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>

      </form>
	


</div>


@endsection