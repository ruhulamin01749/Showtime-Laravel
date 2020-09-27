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

                <?php if($title != "Edit-Soft-Category"){ ?>
	                <form class="form-horizontal col-md-6" method="post" action="{{url('/save-soft-category')}}" enctype="multipart/form-data">
	                	@csrf
	                    <div class="card-body">
	                        <h4 class="card-title">Create New Software Category</h4>
                          <hr>
	                        <div class="form-group row">
	                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Software Category Name : </label>
	                            <div class="col-sm-12">
	                                <input type="text" class="form-control" id="fname" placeholder="Category Name Here" name="category_name" required>
	                            </div>
	                        </div>
                          <div class="form-group row">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label">Category Thumbnail : <b style="color: red">Thumbnail must be (400px * 215px)</b></label>
                              <div class="col-sm-12">
                                  <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="validatedCustomFile" name="category_thumbnail" required>
                                      <label class="custom-file-label" for="validatedCustomFile">Choose Thumbnail Image...</label>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="sumbit" class="btn btn-primary">Save Software Category</button>
                            </div>
                          </div>
	                    </div>
	                </form>
                <?php }else{ ?>
                  <form class="form-horizontal col-md-6" method="post" action="{{url('/update-soft-category')}}" enctype="multipart/form-data">
                    @csrf
                      <div class="card-body">
                          <h4 class="card-title">Edit Software Category</h4>
                          <hr>
                          <input type="hidden" name="category_id" value="{{$category->category_id}}">
                          <div class="form-group row">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label">Category Name : </label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="fname" placeholder="Category Name Here" name="category_name" value="{{$category->category_name}}" required>
                              </div>
                          </div>
                          <div class="form-group row">
                            <img style="margin-left:20px;height: 80px" src="{{asset('/'.$category->category_thumbnail)}}">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label">Software Category Thumbnail : <b style="color: red">Thumbnail must be (400px * 215px)</b></label>
                              <div class="col-sm-12">
                                  <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="validatedCustomFile" name="category_thumbnail">
                                      <label class="custom-file-label" for="validatedCustomFile">Choose Thumbnail Image...</label>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="sumbit" class="btn btn-warning">Update Software Category</button>
                                <a class="btn btn-info" href="{{URL::to('/manage-soft-category')}}">Cancel</a>
                            </div>
                          </div>
                      </div>
                  </form>
                <?php } ?>
	            </div>
              <div class="card dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="card-body">
                    <h5 class="card-title">Software Category List</h5>
                </div>
                <table id="table_category" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Category Name</th>
                      <th scope="col">Category Thumbnail</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $sl = 1; ?>
                    @foreach($categories as $category)
                    <tr>
                      <th scope="row">{{$sl++}}</th>
                      <td>{{$category->category_name}}</td>
                      <td>
                          <img style="height: 100px" src="{{asset('/'.$category->category_thumbnail)}}">
                      </td>
                      <td>{{$category->created_at}}</td>
                      <td>
                          <a href="{{URL::to('/edit-soft-category/'.$category->category_id)}}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                          <a href="{{URL::to('/delete-soft-category/'.$category->category_id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you Sure about Delete???')"><i class="fa fa-trash"></i> Delete</a>
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