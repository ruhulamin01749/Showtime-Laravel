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

                <?php if($title != "Edit-Software"){ ?>
                  <form class="form-horizontal" method="post" action="{{url('/save-software')}}">
                    @csrf
                      <div class="card-body">
                          <h4 class="card-title">Create New Software</h4>
                          <hr>
                          <div class="row mb-3">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="fname" class="col-sm-12 text-left control-label col-form-label">Software Name : </label>
                                      <div class="col-sm-12">
                                          <input type="text" class="form-control" id="fname" name="software_name" placeholder="Software Title" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fname" class="col-sm-12 text-left control-label col-form-label"> Main Category : </label>
                                    <div class="col-md-12">
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="main_soft_cat_id">
                                          <option value="">Select Main Category</option>
                                          @foreach($main_categories as $mainCat)
                                            <option value="{{$mainCat->main_soft_cat_id}}">{{$mainCat->main_soft_cat_name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fname" class="col-sm-12 text-left control-label col-form-label"> Software Category : </label>
                                    <div class="col-md-12">
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="category_id">
                                          <option value="">Select Category</option>
                                          @foreach($categories as $cat)
                                            <option value="{{$cat->category_id}}">{{$cat->category_name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fname" class="col-sm-12 text-left control-label col-form-label">Software Size : </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="fname" placeholder="Software Size" name="software_size" required>
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fname" class="col-sm-12 text-left control-label col-form-label">Software Link : </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="fname" placeholder="Software Link" name="software_link" required>
                                    </div>
                                    <input type="hidden" name="uploader" value="{{Auth::user()->name}}">
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <div class="col-sm-12">
                                      <button type="sumbit" class="btn btn-primary">Save Software</button>
                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </form>
                <?php }else{ ?>
                  <form class="form-horizontal" method="post" action="{{url('/update-software')}}">
                    @csrf
                      <div class="card-body">
                          <h4 class="card-title">Edit Software</h4>
                          <hr>
                          <div class="row mb-3">
                              <div class="col-md-6">
                                  <input type="hidden" name="software_id" value="{{$soft->id}}">
                                  <div class="form-group">
                                      <label for="fname" class="col-sm-12 text-left control-label col-form-label">Software Name : </label>
                                      <div class="col-sm-12">
                                          <input type="text" class="form-control" id="fname" placeholder="software Name Here" name="software_name" value="{{$soft->software_name}}" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="fname" class="col-sm-12 text-left control-label col-form-label"> Main Category : </label>
                                      <div class="col-md-12">
                                          <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="main_soft_cat_id">
                                            <option value="">Select Main Category</option>
                                            @foreach($main_categories as $mainCat)
                                              <option value="{{$mainCat->main_soft_cat_id}}" <?php if($mainCat->main_soft_cat_id == $soft->main_category){echo "selected";} ?> >{{$mainCat->main_soft_cat_name}}</option>
                                            @endforeach
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="fname" class="col-sm-12 text-left control-label col-form-label"> Software Category : </label>
                                      <div class="col-md-12">
                                          <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="category_id">
                                            <option value="">Select Main Category</option>
                                            @foreach($categories as $cat)
                                              <option value="{{$cat->category_id}}" <?php if($cat->category_id == $soft->category_id){echo "selected";} ?> >{{$cat->category_name}}</option>
                                            @endforeach
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="fname" class="col-sm-12 text-left control-label col-form-label">Software Size : </label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="fname" name="software_size" value="{{$soft->software_size}}" required>
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="fname" class="col-sm-12 text-left control-label col-form-label">Software Link : </label>
                                      <div class="col-sm-12">
                                          <input type="url" class="form-control" id="fname" value="{{$soft->software_link}}" name="software_link" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-12">
                                  <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="sumbit" class="btn btn-warning">Update Software</button>
                                        <a class="btn btn-info" href="{{URL::to('/manage-software')}}">Cancel</a>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
                <?php } ?>
              </div>
              <div class="card dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="card-body">
                    <h5 class="card-title">Software List</h5>
                </div>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Software Name</th>
                      <th scope="col">Category</th>
                      <th scope="col">Software Size</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Uploader</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $sl = 1; ?>
                    @foreach($softs as $soft)
                    <tr>
                      <th scope="row">{{$sl++}}</th>
                      <td>{{$soft->software_name}}</td>
                      <td>{{$soft->soft_category->category_name}}</td>
                      <td>{{$soft->software_size}}</td>
                      <td>{{$soft->created_at}}</td>
                      <td>{{$soft->uploader}}</td>
                      <td>
                          <a href="{{URL::to('/edit-software/'.$soft->id)}}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                          <a href="{{URL::to('/delete-software/'.$soft->id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you Sure about Delete???')"><i class="fa fa-trash"></i> Delete</a>
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