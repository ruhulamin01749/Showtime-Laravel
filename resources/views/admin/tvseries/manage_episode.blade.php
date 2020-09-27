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

                <?php if($title != "Edit Episode"){ ?>
	                <form class="form-horizontal" method="post" action="{{url('/save-episode')}}" enctype="multipart/form-data">
	                	@csrf
	                    <div class="card-body">
	                        <h4 class="card-title">Create New Tv Series</h4>
                          <hr>
                         <div class="row mb-3">
                            <div class="form-group col-md-6">
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

                          <div class="form-group col-md-6">
                              <label for="" class="col-sm-12 text-left control-label col-form-label"> Tv-Series : </label>
                              <div class="col-md-12">
                                  <select class="select2 form-control custom-select" style="width: 100%;" name="series_id">
                                    <option value="">Select Tv Series</option>
                                      <?php 
                                        foreach ($tvseries as $value) {
                                          echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                        }
                                      ?>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label for="" class="col-sm-12 text-left control-label col-form-label"> Season : </label>
                              <div class="col-md-12">
                                  <select class="select2 form-control custom-select" style="width: 100%;" name="season">
                                    <option value="">Select Season</option>
                                      <?php 
                                        for($i = 1;$i<=50;$i++){
                                          echo '<option value="'.$i.'">Season '.$i.'</option>';
                                        }
                                      ?>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label for="" class="col-sm-12 text-left control-label col-form-label"> Episode : </label>
                              <div class="col-md-12">
                                  <select class="select2 form-control custom-select" style="width: 100%;" name="episode">
                                    <option value="">Select Episode</option>
                                      <?php 
                                        for($i = 1;$i<=100;$i++){
                                          echo '<option value="'.$i.'">Episode '.$i.'</option>';
                                        }
                                      ?>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group col-md-4">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label">File Size : </label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="fname" placeholder="File Size" name="size" required>
                              </div>
                          </div>
                          <div class="form-group col-md-8">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label">File Link : </label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="fname" placeholder="File Link" name="link" required>
                              </div>
                          </div>

                          
                          <div class="form-group col-md-12">
                            <div class="col-sm-12">
                                <button type="sumbit" class="btn btn-primary">Save Episode</button>
                            </div>
                          </div>
                        </div>
	                        
	                    </div>
	                </form>
                <?php }else{ ?>
                  <form class="form-horizontal" method="post" action="{{url('/update-episode')}}" enctype="multipart/form-data">
                    @csrf
                      <div class="card-body">
                          <h4 class="card-title">Edit Tv-Series</h4>
                          <hr>
                          <input type="hidden" name="episode_id" value="{{$episode->episode_id}}">
                          <div class="row mb-3">
                              <div class="form-group col-md-6">
                              <label for="" class="col-sm-12 text-left control-label col-form-label"> Tv-Series Category : </label>
                              <div class="col-md-12">
                                  <select class="select2 form-control custom-select" style="width: 100%;" name="category">
                                    <option value="">Select Category</option>
                                      <?php 
                                          foreach ($categories as $category) {
                                            if($episode->category == $category->category_id){
                                                echo '<option value="'.$category->category_id.'" selected>'.$category->category_name.'</option>';
                                            }else{
                                                echo '<option value="'.$category->category_id.'">'.$category->category_name.'</option>';
                                            }
                                          }
                                        ?>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label for="" class="col-sm-12 text-left control-label col-form-label"> Tv-Series : </label>
                              <div class="col-md-12">
                                  <select class="select2 form-control custom-select" style="width: 100%;" name="series_id">
                                    <option value="">Select Tv Series</option>
                                      <?php 
                                        foreach ($tvseries as $value) {
                                          if($episode->series_id==$value->id){
                                              echo '<option value="'.$value->id.'" selected>'.$value->name.'</option>';
                                          }else{
                                            echo '<option value="'.$value->id.'">'.$value->name.'</option>';
                                          }
                                          
                                        }
                                      ?>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label for="" class="col-sm-12 text-left control-label col-form-label"> Season : </label>
                              <div class="col-md-12">
                                  <select class="select2 form-control custom-select" style="width: 100%;" name="season">
                                    <option value="">Select Season</option>
                                      <?php 
                                        for($i = 1;$i<=50;$i++){
                                          if($i == $episode->season){
                                              echo '<option value="'.$i.'" selected >Season '.$i.'</option>';
                                          }else{
                                            echo '<option value="'.$i.'">Season '.$i.'</option>';
                                          }
                                          
                                        }
                                      ?>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group col-md-6">
                              <label for="" class="col-sm-12 text-left control-label col-form-label"> Episode : </label>
                              <div class="col-md-12">
                                  <select class="select2 form-control custom-select" style="width: 100%;" name="episode">
                                    <option value="">Select Episode</option>
                                      <?php 
                                        for($i = 1;$i<=100;$i++){
                                          if($i == $episode->episode){
                                            echo '<option value="'.$i.'" selected >Episode '.$i.'</option>';
                                          }else{
                                            echo '<option value="'.$i.'">Episode '.$i.'</option>';
                                          }
                                        }
                                      ?>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group col-md-4">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label">File Size : </label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="fname" value="{{$episode->size}}" name="size" required>
                              </div>
                          </div>
                          <div class="form-group col-md-8">
                              <label for="fname" class="col-sm-12 text-left control-label col-form-label">File Link : </label>
                              <div class="col-sm-12">
                                  <input type="text" class="form-control" id="fname" value="{{$episode->link}}" name="link" required>
                              </div>
                          </div>
                              
                              <div class="form-group col-sm-12">
                                <div class="col-sm-12">
                                    <button type="sumbit" class="btn btn-warning">Update Episode</button>
                                    <a class="btn btn-danger" href="{{URL::to('/manage-episode')}}">Cancel</a>
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
                      <th scope="col">Category</th>
                      <th scope="col">Season </th>
                      <th scope="col">Episode</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $sl = 1; ?>
                    @foreach($episodes as $value)
                    <tr>
                      <th scope="row">{{$sl++}}</th>
                      <td>{{$value->name}}</td>
                      <td>{{$value->category_name}}</td>
                      <td>Session {{$value->season}}</td>
                      <td>Episode {{$value->episode}}</td>
                      <td>
                          <a href="{{URL::to('/edit-episode/'.$value->episode_id)}}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                          <a href="{{URL::to('/delete-episode/'.$value->episode_id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you Sure about Delete???')"><i class="fa fa-trash"></i> Delete</a>
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