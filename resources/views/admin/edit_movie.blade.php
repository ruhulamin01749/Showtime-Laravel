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

                  <form class="form-horizontal" method="post" action="{{url('/update-movie')}}" enctype="multipart/form-data">
                          @csrf
                      <div class="card-body">
                          <h4 class="card-title">Edit Movie</h4>
                          <hr>
                          <div class="row mb-3">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="col-sm-12 text-left control-label col-form-label">Movie Title  <b style="color: red">{Required}</b> : </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="movie_name" value="{{$movie->movie_name}}" required>
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                              <label class="col-sm-12 text-left control-label col-form-label">Movie Thumbnail :</label>
                              <div class="col-sm-12">
                                  <div class="custom-file">
                                      <input type="file" class="custom-file-input" name="movie_image">
                                      <label class="custom-file-label" for="validatedCustomFile">Choose Thumbnail Image...</label>
                                  </div>
                              </div>
                          </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                <label class="col-sm-12 text-left control-label col-form-label"> Movie Category <b style="color: red">{Required}</b> : </label>
                                <div class="col-md-12">
                                    <select class="select2 form-control custom-select" style="width: 100%;" name="movie_category" required>
                                      <option value="">Select Main Category</option>
                                        @foreach($categories as $category )
                                        <option value="{{$category->category_id}}" <?php if($category->category_id == $movie->movie_category){echo "selected"; } ?> >{{$category->category_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label for="" class="col-sm-12 text-left control-label col-form-label"> Movie Year : </label>
                                  <div class="col-md-12">
                                      <select class="select2 form-control custom-select" style="width: 100%;" name="year">
                                        <option value="">Select Year</option>
                                          <?php 
                                            for($i = date("Y");$i>=1900;$i--){
                                              if($i == $movie->year){
                                                  echo '<option value="'.$i.'" selected >'.$i.'</option>';
                                              }else{
                                                  echo '<option value="'.$i.'">'.$i.'</option>';
                                              }
                                            }
                                          ?>
                                      </select>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label class="col-sm-12 text-left control-label col-form-label"> Movie Sequel : </label>
                                  <div class="col-md-12">
                                      <select class="select2 form-control custom-select" style="width: 100%; " name="movie_sequel">
                                        <option value="">Select Sequel</option>
                                          @foreach($sequels as $sequel )
                                            <option value="{{$sequel->sequel_id}}" <?php if($sequel->sequel_id == $movie->movie_sequel){echo 'selected';} ?> >{{$sequel->sequel_name}} </option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label class="col-sm-12 text-left control-label col-form-label"> Movie Resulation : </label>
                                  <div class="col-md-12">
                                      <select class="select2 form-control custom-select" style="width: 100%; " name="movie_resulation">
                                        <option value="">Select Resulation</option>
                                          @foreach($resulations as $resulation )
                                            <option value="{{$resulation->resulation_id}}" <?php if($resulation->resulation_id == $movie->movie_resulation){echo 'selected';} ?> >{{$resulation->resulation_name}} </option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                          </div>

                          <div class="col-lg-6">
                              <div class="form-group">
                                <label class="col-sm-12 text-left control-label col-form-label">IMDB Link : </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="imdb_link" value="<?php echo $movie->imdb_link; ?>">
                                </div>
                            </div>
                          </div>

                          <div class="col-lg-6">
                              <div class="form-group" >
                                     <label class="col-sm-12 text-left control-label col-form-label">Movie Genres <b style="color: red">{Required}</b> : </label>
                                    <div class="col-sm-12">
                                        <select name="genres[]" class="select2 form-control" multiple="4" style="width: 100%;"  tabindex="-1" aria-hidden="true">
                                            @foreach($genres as $genre)
                                              
                                                  <option value="{{$genre->genre_id}}"
                                                     @foreach($movie->movie_genre as $m_genre)
                                                      <?php if($genre->genre_id == $m_genre->genre_id){echo 'selected';} ?>
                                                      @endforeach
                                                   >{{$genre->genre_name}} </option>
                                               
                                            @endforeach
                                         </select>
                                    </div>
                              </div>
                          </div>

                          <div class="col-lg-6">
                              <div class="form-group">
                                <label class="col-sm-12 text-left control-label col-form-label">Release Date  : </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="realese_date" value="{{$movie->realese_date}}">
                                </div>
                            </div>
                          </div>

                          <div class="col-lg-6">
                              <div class="form-group">
                                <label class="col-sm-12 text-left control-label col-form-label">Director  : </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="director" value="{{$movie->director}}">
                                </div>
                            </div>
                          </div>

                          <div class="col-lg-6">
                              <div class="form-group">
                                <label class="col-sm-12 text-left control-label col-form-label">Cast  : </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="cast" value="{{$movie->cast}}">
                                </div>
                            </div>
                          </div>

                          <div class="col-lg-3">
                              <div class="form-group">
                                <label class="col-sm-12 text-left control-label col-form-label">IMDB Rating  : </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="rating" value="{{$movie->rating}}">
                                </div>
                            </div>
                          </div>

                          <div class="col-lg-3">
                              <div class="form-group">
                                <label class="col-sm-12 text-left control-label col-form-label">Movie Size <b style="color: red">{Required}</b> : </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="movie_size" value="{{$movie->movie_size}}" required>
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                <label class="col-sm-12 text-left control-label col-form-label">Trailer  : </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="trailor" value="{{$movie->trailor}}">
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                <label class="col-sm-12 text-left control-label col-form-label">Subtitle Link  : </label>
                                <div class="col-sm-12">
                                    <input type="url" class="form-control" name="movie_subtitle" value="{{$movie->movie_subtitle}}">
                                </div>
                            </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label class="col-sm-12 text-left control-label col-form-label">Movie Download Link <b style="color: red">{Required}</b> : </label>
                                  <div class="col-sm-12">
                                      <input type="url" class="form-control" name="movie_link" value="{{$movie->movie_link}}" required>
                                  </div>
                                  <input type="hidden" name="movie_id" value="{{$movie->movie_id}}">
                              </div>
                          </div>

                          <div class="col-lg-3">
                              <div class="form-group">
                                <label class="col-sm-12 text-left control-label col-form-label">New Release  : </label><br>

                                  <div style="margin-top: 8px;margin-left: 10px" class="custom-control custom-checkbox col-sm-12">
                                      <input name="new" value="1" <?php if($movie->new == 1){echo 'checked';} ?> type="checkbox" class="custom-control-input" id="customControlAutosizing1">
                                      <label style="color: green;font-weight: bold;" class="custom-control-label" for="customControlAutosizing1">IF Yes</label>
                                  </div>
                            </div>
                          </div>

                          <div class="col-lg-3">
                              <div class="form-group">
                                <label class="col-sm-12 text-left control-label col-form-label">Slider : </label><br>

                                  <div style="margin-top: 8px;margin-left: 10px" class="custom-control custom-checkbox col-sm-12">
                                      <input name="slider" <?php if($movie->slider == 1){echo 'checked';} ?> value="1" type="checkbox" class="custom-control-input" id="customControlAutosizing2">
                                      <label style="color: green;font-weight: bold;" class="custom-control-label" for="customControlAutosizing2">IF Yes</label>
                                  </div>
                            </div>
                          </div>

                        </div>
                          <div class="form-group row">
                            <div class="col-sm-12">                               
                                <a href="{{URL::to('/manage-movie')}}" class="btn btn btn-danger">Cancel</a>
                                <button type="sumbit" class="btn btn-primary">Update Movie</button>
                            </div>
                          </div>
                      </div>
                  </form>
              </div>
          </div>        
    </div>
  </div>
@endsection
