@extends('admin.layouts.layout')
@section('main_content')
<style type="text/css">
  .col-form-label{
    padding-top: 0px;
    padding-bottom: 0px;
  }
  .table td, .table th {
    padding: 5px;
  }
  .mb-3{
    margin-bottom: 0px!important;
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

                <?php if($title != "Edit Tv-Series"){ ?>
	                <form class="form-horizontal" method="post" action="{{url('/save-tvseries')}}" enctype="multipart/form-data">
	                	@csrf
	                    <div class="card-body">
	                        <h4 class="card-title">Create New Tv Series</h4>
                          <hr>
                         <div class="row mb-3">
                            <div class="form-group col-md-5">
                                <label for="fname" class="col-sm-12 text-left control-label col-form-label">Tv-Series Title : </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="fname" placeholder="Tv-Series Title" name="name" required>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                              <label for="" class="col-sm-12 text-left control-label col-form-label"> Tv-Series Category : </label>
                              <div class="col-md-12">
                                  <select class="select2 form-control custom-select" style="width: 100%;" name="category">
                                    <option value="">Select Category</option>
                                      <?php 
                                        foreach ($categories as $category) {
                                          echo '<option value="'.$category->category_id.'">'.$category->category_name.'</option>';
                                        }
                                      ?>
                                  </select>
                              </div>
                          </div>
                            <div class="form-group col-md-4">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label">Tv-Series Thumbnail :</label>
                              <div class="col-sm-12">
                                  <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="validatedCustomFile" name="thumbnail" required>
                                      <label class="custom-file-label" for="validatedCustomFile">Choose Thumbnail Image...</label>
                                  </div>
                              </div>
                          </div>

                          
                          <div class="form-group col-md-12">
                            <div class="col-sm-12">
                                <button type="sumbit" class="btn btn-primary">Save Tv-Series</button>
                            </div>
                          </div>
                        </div>
	                        
	                    </div>
	                </form>
                <?php }else{ ?>
                  <form class="form-horizontal" method="post" action="{{url('/update-tvseries')}}" enctype="multipart/form-data">
                    @csrf
                      <div class="card-body">
                          <h4 class="card-title">Edit Tv-Series</h4>
                          <hr>
                          <input type="hidden" name="id" value="{{$series->id}}">
                          <div class="row mb-3">
                              <div class="form-group col-md-5">
                                  <label for="fname" class="col-sm-12 text-left control-label col-form-label">Tv-Series Title : </label>
                                  <div class="col-sm-12">
                                      <input type="text" class="form-control" id="fname" value="{{$series->name}}" name="name" required>
                                  </div>
                              </div>
                              <div class="form-group col-md-3">
                                  <label for="" class="col-sm-12 text-left control-label col-form-label"> Tv-Series Category : </label>
                                  <div class="col-md-12">
                                      <select class="select2 form-control custom-select" style="width: 100%;" name="category">
                                        <option value="">Select Category</option>
                                          <?php 
                                              foreach ($categories as $category) {
                                                if($series->category == $category->category_id){
                                                    echo '<option value="'.$category->category_id.'" selected>'.$category->category_name.'</option>';
                                                }else{
                                                    echo '<option value="'.$category->category_id.'">'.$category->category_name.'</option>';
                                                }
                                              }
                                            ?>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group col-md-4">
                                  <label for="fname" class="col-sm-12 text-left control-label col-form-label">Award Show Thumbnail : </label>
                                  <div class="col-sm-12">
                                      <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="validatedCustomFile" name="thumbnail">
                                          <label class="custom-file-label" for="validatedCustomFile">Choose Thumbnail Image...</label>
                                      </div>
                                  </div>
                              </div>
                              
                              <div class="form-group col-sm-12">
                                <div class="col-sm-12">
                                    <button type="sumbit" class="btn btn-warning">Update Tv Series</button>
                                    <a class="btn btn-info" href="{{URL::to('/manage-tvseries')}}">Cancel</a>
                                </div>
                              </div>
                          </div>
                      </div>
                  </form>
                <?php } ?>
	            </div>
              <div class="card dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="card-body">
                    <h5 class="card-title">Tv Series List</h5>
                </div>
                <table id="table_sequel" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Tv-Series Title</th>
                      <th scope="col">Show Thumbnail</th>
                      <th scope="col">Category</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $sl = 1; ?>
                    @foreach($tvseries as $value)
                    <tr>
                      <th scope="row">{{$sl++}}</th>
                      <td>{{$value->name}}</td>
                      <td>
                          <img style="height: 100px" src="{{asset('/'.$value->thumbnail)}}">
                      </td>
                      <td>{{$value->category_name}}</td>
                      <td>{{$value->created_at}}</td>
                      <td>
                          <a href="{{URL::to('/edit-tvseries/'.$value->id)}}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                          <a href="{{URL::to('/delete-tvseries/'.$value->id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you Sure about Delete???')"><i class="fa fa-trash"></i> Delete</a>
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