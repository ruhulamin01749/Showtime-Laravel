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

                <?php if($title != "Edit-Game"){ ?>
                  <form class="form-horizontal" method="post" action="{{url('/save-game')}}">
                    @csrf
                      <div class="card-body">
                          <h4 class="card-title">Create New Game</h4>
                          <hr>
                          <div class="row mb-3">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="fname" class="col-sm-12 text-left control-label col-form-label">Game Name : </label>
                                      <div class="col-sm-12">
                                          <input type="text" class="form-control" id="fname" name="game_name" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="fname" class="col-sm-12 text-left control-label col-form-label"> Game Category : </label>
                                    <div class="col-md-12">
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="game_category">
                                          <option value="">Select Category</option>
                                          @foreach($categories as $Cat)
                                            <option value="{{$Cat->category_id}}">{{$Cat->category_name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="fname" class="col-sm-12 text-left control-label col-form-label">Game Size : </label>
                                      <div class="col-sm-12">
                                          <input type="text" class="form-control" id="fname" name="game_size" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="fname" class="col-sm-12 text-left control-label col-form-label">Game Link : </label>
                                      <div class="col-sm-12">
                                          <input type="text" class="form-control" id="fname" name="game_link" required>
                                      </div>
                                      <input type="hidden" name="uploader" value="{{Auth::user()->name}}">
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="sumbit" class="btn btn-primary">Save Game</button>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </form>
                <?php }else{ ?>
                  <form class="form-horizontal" method="post" action="{{url('/update-game')}}">
                    @csrf
                      <div class="card-body">
                          <h4 class="card-title">Edit Game</h4>
                          <hr>
                          <div class="row mb-3">
                              <div class="col-md-6">
                                  <input type="hidden" name="game_id" value="{{$game->id}}">
                                  <div class="form-group">
                                      <label for="fname" class="col-sm-12 text-left control-label col-form-label">Game Name : </label>
                                      <div class="col-sm-12">
                                          <input type="text" class="form-control" id="fname" placeholder="game Name Here" name="game_name" value="{{$game->game_name}}" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="fname" class="col-sm-12 text-left control-label col-form-label"> Game Category : </label>
                                    <div class="col-md-12">
                                        <select class="select2 form-control custom-select" style="width: 100%; height:36px;" name="game_category">
                                          <option value="">Select Category</option>
                                          @foreach($categories as $Cat)
                                            <option value="{{$Cat->category_id}}" <?php if($Cat->category_id==$game->game_category){echo 'selected'; } ?> >{{$Cat->category_name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                  <label for="fname" class="col-sm-12 text-left control-label col-form-label">Game Size : </label>
                                  <div class="col-sm-12">
                                      <input type="text" class="form-control" id="fname" name="game_size" value="{{$game->game_size}}" required>
                                  </div>
                              </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="fname" class="col-sm-12 text-left control-label col-form-label">Game Link : </label>
                                      <div class="col-sm-12">
                                          <input type="url" class="form-control" id="fname" value="{{$game->game_link}}" name="game_link" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <div class="col-sm-12">
                                          <button type="sumbit" class="btn btn-warning">Update Game</button>
                                          <a class="btn btn-info" href="{{URL::to('/manage-game')}}">Cancel</a>
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
                    <h5 class="card-title">Games List</h5>
                </div>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Game Name</th>
                      <th scope="col">Game Size</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Uploader</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $sl = 1; ?>
                    @foreach($games as $game)
                    <tr>
                      <th scope="row">{{$sl++}}</th>
                      <td>{{$game->game_name}}</td>
                      <td style="width: 12%">{{$game->game_size}}</td>
                      <td style="width: 12%">{{$game->created_at}}</td>
                      <td>{{$game->uploader}}</td>
                      <td style="width: 18%">
                          <a href="{{URL::to('/edit-game/'.$game->id)}}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                          <a href="{{URL::to('/delete-game/'.$game->id)}}" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you Sure about Delete???')"><i class="fa fa-trash"></i> Delete</a>
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