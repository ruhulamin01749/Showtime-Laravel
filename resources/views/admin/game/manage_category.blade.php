@extends('admin.layouts.layout')
@section('main_content')
<style type="text/css">
  .form-group{
    margin-bottom: 5px;
  }
  .col-form-label{
    padding-top: 0px;
    padding-bottom: 0px;
  }
  .table td, .table th {
    padding: 5px;
  }
</style>
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12" data-select2-id="15">
              <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                          {{ $error }}<br>
                        @endforeach
                    </div><br>
                @endif
                @if(Session::has('success'))
                  <div class="alert alert-success">{{Session::get('success')}}</div><br>
                @endif
                @if(Session::has('error'))
                  <div class="alert alert-danger">{{Session::get('error')}}</div><br>
                @endif

                <?php if($title != "Edit-Game-Category"){ ?>
                  <form class="form-horizontal col-md-8" method="post" action="{{url('/save-game-category')}}">
                    @csrf
                      <div class="card-body">
                          <h4 class="card-title">Create New Game Category</h4>
                          <hr>
                          <div class="form-group row">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label">Category Name : </label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="fname" placeholder="Games Category" name="category_name" required>
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="sumbit" class="btn btn-primary">Save Category</button>
                            </div>
                          </div>
                      </div>
                  </form>
                <?php }else{ ?>
                  <form class="form-horizontal col-md-6" method="post" action="{{url('/update-game-category')}}">
                    @csrf
                      <div class="card-body">
                          <h4 class="card-title">Edit Game Category</h4>
                          <hr>
                          <input type="hidden" name="category_id" value="{{$category->category_id}}">
                          <div class="form-group row">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label">Category Name : </label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="fname" name="category_name" value="{{$category->category_name}}" required>
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="sumbit" class="btn btn-warning">Update Category</button>
                                <a class="btn btn-info" href="{{URL::to('/manage-category')}}">Cancel</a>
                            </div>
                          </div>
                      </div>
                  </form>
                <?php } ?>
              </div>
              <div class="card dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="card-body">
                    <h5 class="card-title">Category List</h5>
                </div>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Category Name</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $sl = 1; ?>
                    @foreach($categories as $gameCat)
                    <tr>
                      <th scope="row">{{$sl++}}</th>
                      <td>{{$gameCat->category_name}}</td>
                      <td>{{$gameCat->created_at}}</td>
                      <td>
                          <a href="{{URL::to('/edit-game-category/'.$gameCat->category_id)}}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                          <a href="{{URL::to('/delete-game-category/'.$gameCat->category_id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you Sure about Delete???')"><i class="fa fa-trash"></i> Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
          </div>        
    </div>
  </div>
@endsection