@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard
                    <a href="" class="btn btn-danger btn-sm" style="float: right;" data-toggle="modal" data-target="#exampleModalCenter" > Add New</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @php
                     $post=App\Saif::orderBy('id','DESC')->get();
                    @endphp
                   <table class="table table-dark">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Title</th>
                          <th scope="col">Author</th>
                          <th scope="col">Tags</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($post as $row)
                        <tr>
                          <th scope="row">{{$row->id }}</th>
                          <td>{{$row->title }}</td>
                          <td>{{$row->author }}</td>
                          <td>{{$row->tag }}</td>
                          <td>
                            <a href="{{URL::to('delete-post/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete" >Delete</a>
                            
                            <a href="{{URL::to('edit-post/'.$row->id)}}" class="btn btn-sm btn-success" >Edit</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>


                    
                    
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('insert-post')}}" method="post">
        @csrf


    <div class="form-group">
    <label >Title</label>
    <input type="text" name="title" class="form-control" placeholder="Enter title">
    </div>


  <div class="form-group">
    <label >Author</label>
    <input type="text" name="author" class="form-control" placeholder="Enter Authors">
    
  </div>
  <div class="form-group">
    <label >Tags</label>
    <input type="text" name="tag" class="form-control"  placeholder="Enter tags">
    </div>
    <div class="form-group">
    <label > Description</label>
    <textarea type="text" name="description" class="form-control" placeholder="Enter Description" ></textarea>
    
    </div>


      </div>
      <div class="modal-footer">
       
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>

      </form>
    </div>
  </div>
</div>


@endsection
