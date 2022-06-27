@extends('layouts.dashboard_main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4>Change Profile Name</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('profile.store')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Profile Name</label>
                                <input type="text" class="form-control" name="name" value="{{Auth::User()->name}}">
                            </div>
                              <button type="submit" class="btn btn-warning mt-4">Change Name</button>
                        </form>
                        
                    </div>
                </div>
            </div>

            <div class="col-md-3 mt-3">
                <div class="card">
                  <div class="card-header bg-info text-white">
                      <h4>Change Profile Picture</h4>
                  </div>
                  <div class="card-body">
          
                    @if(session('image_success'))
                    <div class="alert alert-success">
                        {{session('image_success')}}
                    </div>
                    @endif
                    @error('image_error')
                      <div class="alert alert-danger">
                          {{$message}}
                      </div>
                    @enderror
                      <form method="POST" action="{{route('profile.photo')}}" enctype="multipart/form-data" >
                          @csrf
                          <div class="mb-3">
                            <label class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" name="profile_photo" accept="image/jpeg" onchange="readURL(this)" value="" >
                            <img class="hidden mt-3" src="#" id="tenant_photo_viewer" alt="">
                            <style media="screen">
                              .hidden{
                                display: none;
                              }
                            </style>
                            <script>
                              function readURL(input){
                                if(input.files && input.files[0]){
                                  var reader = new FileReader();
                                  reader.onload = function (e){
                                    $('#tenant_photo_viewer').attr('src', e.target.result).width(150).height(150);
          
                                  };
                                  $('#tenant_photo_viewer').removeClass('hidden');
                                  reader.readAsDataURL(input.files[0]);
                                }
                              }
                            </script>
          
                          </div>
                          <button type="submit" class="btn btn-warning mt-4">Change Profile Image</button>
                        </form>
                  </div>
                </div>
            </div>

            <div class="col-md-3 mt-3">
                <div class="card">
                  <div class="card-header bg-secondary">
                      <h4 class="text-white">Change Profile Password</h4>
                  </div>
                  <div class="card-body">
                      @if (session('success'))
                          <div class="alert alert-success">
                              {{session('success')}}
                          </div>
                      @endif
                    @if(session('password_error'))
                        <div class="alert alert-danger">
                            {{session('password_error')}}
                        </div>
                    @endif
                    @error('password')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror
                      <form method="POST" action="{{route('profile.chng_password')}}" >
                          @csrf
                          <div class="mb-3">
                            <label class="form-label">Old Password</label>
                            <input type="password" class="form-control" name="old_pass" placeholder="Enter Old Password">
        
                          </div>
                          <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter New Password" >
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirm Password" >
                          </div>
                          <button type="submit" class="btn btn-warning mt-4">Change Password</button>
                        </form>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection