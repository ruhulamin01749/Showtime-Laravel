@extends('admin.layouts.layout')
@section('main_content')
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

                <?php if($title != "Edit-Movie-Sequel"){ ?>
	                <form class="form-horizontal col-md-6" method="post" action="{{url('/save-sequel')}}" enctype="multipart/form-data">
	                	@csrf
	                    <div class="card-body">
	                        <h4 class="card-title">Create New Sequel</h4>
                          <hr>
	                        <div class="form-group row">
	                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Sequel Name : </label>
	                            <div class="col-sm-12">
	                                <input type="text" class="form-control" id="fname" placeholder="Sequel Name Here" name="sequel_name" required>
	                            </div>
	                        </div>
                          <div class="form-group row">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label">Sequel Thumbnail : <b style="color: red">Thumbnail must be (400px * 215px)</b></label>
                              <div class="col-sm-12">
                                  <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="validatedCustomFile" name="sequel_thumnail" required>
                                      <label class="custom-file-label" for="validatedCustomFile">Choose Thumbnail Image...</label>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="sumbit" class="btn btn-primary">Save Sequel</button>
                            </div>
                          </div>
	                    </div>
	                </form>
                <?php }else{ ?>
                  <form class="form-horizontal col-md-6" method="post" action="{{url('/update-sequel')}}" enctype="multipart/form-data">
                    @csrf
                      <div class="card-body">
                          <h4 class="card-title">Edit Sequel</h4>
                          <hr>
                          <input type="hidden" name="sequel_id" value="{{$sequel->sequel_id}}">
                          <div class="form-group row">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label">Sequel Name : </label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="fname" placeholder="sequel Name Here" name="sequel_name" value="{{$sequel->sequel_name}}" required>
                              </div>
                          </div>
                          <div class="form-group row">
                            <img style="margin-left:20px;height: 80px" src="{{asset('/'.$sequel->sequel_thumnail)}}">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label">Sequel Thumbnail : <b style="color: red">Thumbnail must be (400px * 215px)</b></label>
                              <div class="col-sm-12">
                                  <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="validatedCustomFile" name="sequel_thumnail">
                                      <label class="custom-file-label" for="validatedCustomFile">Choose Thumbnail Image...</label>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="sumbit" class="btn btn-warning">Update Sequel</button>
                                <a class="btn btn-info" href="{{URL::to('/manage-sequel')}}">Cancel</a>
                            </div>
                          </div>
                      </div>
                  </form>
                <?php } ?>
	            </div>
              <div class="card dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="card-body">
                    <h5 class="card-title">Sequel List</h5>
                </div>
                <table id="table_sequel" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Sequel Name</th>
                      <th scope="col">Sequel Thumbnail</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $sl = 1; ?>
                    @foreach($sequels as $sequel)
                    <tr>
                      <th scope="row">{{$sl++}}</th>
                      <td>{{$sequel->sequel_name}}</td>
                      <td>
                          <img style="height: 100px" src="{{asset('/'.$sequel->sequel_thumnail)}}">
                      </td>
                      <td>{{$sequel->created_at}}</td>
                      <td>
                          <a href="{{URL::to('/Edit-Sequel/'.$sequel->sequel_id)}}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                          <a href="{{URL::to('/Delete-Sequel/'.$sequel->sequel_id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you Sure about Delete???')"><i class="fa fa-trash"></i> Delete</a>
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