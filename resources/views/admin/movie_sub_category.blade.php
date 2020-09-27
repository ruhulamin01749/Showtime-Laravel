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

                <?php if($title != "Edit-Sub-Category"){ ?>
	                <form class="form-horizontal col-md-6" method="post" action="{{url('/save-sub-category')}}">
	                	@csrf
	                    <div class="card-body">
	                        <h4 class="card-title">Create New Sub Category</h4>
                          <hr>
	                        <div class="form-group row">
	                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Sub Category Name : </label>
	                            <div class="col-sm-12">
	                                <input type="text" class="form-control" id="fname" placeholder=" Sub Category Name" name="sub_category_name" required>
	                            </div>
	                        </div>
                          <div class="form-group row">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label"> Main Category : </label>
                              <div class="col-md-12">
                                  <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="category_id">
                                    <option value="">Select Main Category</option>
                                    @foreach($categories as $cat)
                                      <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                                    @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="sumbit" class="btn btn-primary">Save Sub Category</button>
                            </div>
                          </div>
	                    </div>
	                </form>
                <?php }else{ ?>
                  <form class="form-horizontal col-md-6" method="post" action="{{url('/update-sub-category')}}">
                    @csrf
                      <div class="card-body">
                          <h4 class="card-title">Edit Sub Category</h4>
                          <hr>
                          <input type="hidden" name="sub_category_id" value="{{$sub_category->sub_category_id}}">
                          <div class="form-group row">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label">Sub Category Name : </label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="fname" placeholder="Sub Category Name Here" name="sub_category_name" value="{{$sub_category->sub_category_name}}" required>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label"> Main Category : </label>
                              <div class="col-md-12">
                                  <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="category_id" id="category_id">
                                    <option value="">Select Main Category</option>
                                    @foreach($categories as $cat)
                                      <option value="{{$cat->category_id}}" <?php if($cat->category_id == $sub_category->category_id){echo "selected";} ?> >{{$cat->category_name}}</option>
                                    @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="sumbit" class="btn btn-warning">Update Sub Category</button>
                                <a class="btn btn-info" href="{{URL::to('/manage-sub-category')}}">Cancel</a>
                            </div>
                          </div>
                      </div>
                  </form>
                <?php } ?>
	            </div>
              <div class="card dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="card-body">
                    <h5 class="card-title">Sub Category List</h5>
                </div>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Sub Category Name</th>
                      <th scope="col">Category Name</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $sl = 1; ?>
                    @foreach($sub_categories as $category)
                    <tr>
                      <th scope="row">{{$sl++}}</th>
                      <td>{{$category->sub_category_name}}</td>
                      <td>{{$category->category->category_name}}</td>
                      <td>{{$category->created_at}}</td>
                      <td>
                          <a href="{{URL::to('/Edit-Sub-Category/'.$category->sub_category_id)}}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                          <a href="{{URL::to('/Delete-Sub-Category/'.$category->sub_category_id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you Sure about Delete???')"><i class="fa fa-trash"></i> Delete</a>
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