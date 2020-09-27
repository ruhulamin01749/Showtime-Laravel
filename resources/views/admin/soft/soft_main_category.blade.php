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

                <?php if($title != "Edit-Soft-Main-Category"){ ?>
	                <form class="form-horizontal col-md-6" method="post" action="{{url('/save-soft-main-category')}}" enctype="multipart/form-data">
	                	@csrf
	                    <div class="card-body">
	                        <h4 class="card-title">Create New Software Main Category</h4>
                          <hr>
	                        <div class="form-group row">
	                            <label for="fname" class="col-sm-12 text-left control-label col-form-label">Software Main Category Name : </label>
	                            <div class="col-sm-12">
	                                <input type="text" class="form-control" id="fname" placeholder="Main Category Name " name="main_soft_cat_name" required>
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
                  <form class="form-horizontal col-md-6" method="post" action="{{url('/update-soft-main-category')}}" enctype="multipart/form-data">
                    @csrf
                      <div class="card-body">
                          <h4 class="card-title">Edit Software Main Category</h4>
                          <hr>
                          <input type="hidden" name="main_soft_cat_id" value="{{$category->main_soft_cat_id}}">
                          <div class="form-group row">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label">Category Name : </label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="fname" placeholder="Category Name Here" name="main_soft_cat_name" value="{{$category->main_soft_cat_name}}" required>
                              </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="sumbit" class="btn btn-warning">Update Software Category</button>
                                <a class="btn btn-info" href="{{URL::to('/manage-soft-main-category')}}">Cancel</a>
                            </div>
                          </div>
                      </div>
                  </form>
                <?php } ?>
	            </div>
              <div class="card dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="card-body">
                    <h5 class="card-title">Software Main Category List</h5>
                </div>
                <table id="table_category" class="table table-striped table-bordered">
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
                    @foreach($categories as $category)
                    <tr>
                      <th scope="row">{{$sl++}}</th>
                      <td>{{$category->main_soft_cat_name}}</td>
                      <td>{{$category->created_at}}</td>
                      <td>
                          <a href="{{URL::to('/edit-soft-main-category/'.$category->main_soft_cat_id)}}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                          <a href="{{URL::to('/delete-soft-main-category/'.$category->main_soft_cat_id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you Sure about Delete???')"><i class="fa fa-trash"></i> Delete</a>
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