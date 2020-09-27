@extends('admin.layouts.layout')
@section('main_content')
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12" data-select2-id="15">
              <div class="card">
                @if(Session::has('success'))
                  <div class="alert alert-success">{{Session::get('success')}}</div><br>
                @endif
                @if(Session::has('error'))
                  <div class="alert alert-danger">{{Session::get('error')}}</div><br>
                @endif
                <br>

                <div class="card dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="card-body">
                    <h5 class="card-title">Movie Lists</h5>
                </div>
                <table id="movies" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Movie Name</th>
                      <th scope="col">Category</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Uploader</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $sl = 1; ?>
                    @foreach($movies as $movie)
                    <tr>
                      <th scope="row">{{$sl++}}</th>
                      <td>{{$movie->movie_name}}</td>
                      <td>{{$movie->category->category_name}}</td>
                      <td>{{$movie->created_at}}</td>
                      <td>{{$movie->user}}</td>
                      <td>
                          <a href="{{URL::to('/edit-movie/'.$movie->movie_id)}}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                          <a href="{{URL::to('/delete-movie/'.$movie->movie_id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you Sure about Delete???')"><i class="fa fa-trash"></i> Delete</a>
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
@endsection