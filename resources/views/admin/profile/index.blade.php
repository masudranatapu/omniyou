@extends('admin.layouts.app')
@section('title', 'Quiz - Admin Profile')
@section('content')
  <div class="row mb-4">
      <div class="col-12">
          <div class="card">
              <div class="card-header page_title">
                  <h3>Profile</h3>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
    <div class="col-md-6 mb-4">
       <div class="card">
          <div class="card-header">
            <h6>Edit Profile</h6>
          </div>
          <div class="card-body">
              <form action="{{route('admin.update.profile')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                   <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                   <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" value="{{Auth::user()->name}}" placeholder="Enter your name">
                   @error('name')
                    <div class="text-danger">{{$message}}</div>
                   @enderror
                </div>
                <div class="mb-3">
                   <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                   <input type="text" name="email" class="form-control @error('email')is-invalid @enderror" value="{{Auth::user()->email}}" placeholder="Enter your email">
                   @error('email')
                    <div class="text-danger">{{$message}}</div>
                   @enderror
                </div>
                <div class="mb-3">
                   <label class="form-control-label">Profile Image:</label><br/>
                   <img src="{{asset(Auth::user()->image ?? 'backend/img/profile/default.png')}}" class="mb-3 border rounded" width="80" alt="image">
                   <input type="file" name="image" class="form-control @error('image')is-invalid @enderror">
                   @error('image')
                    <div class="text-danger">{{$message}}</div>
                   @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
          </div><!-- card-body -->
      </div>
    </div>
    <div class="col-md-6">
       <div class="card">
          <div class="card-header">
            <h6>Change Password</h6>
          </div>
          <div class="card-body">
              <form action="{{route('admin.password.change')}}" method="post">
                @csrf
                <div class="mb-3">
                   <label class="form-control-label">Old Password: <span class="tx-danger">*</span></label>
                   <input type="password" name="old_password" class="form-control @error('old_password')is-invalid @enderror" placeholder="Enter old password">
                   @error('old_password')
                    <div class="text-danger">{{$message}}</div>
                   @enderror
                </div>
                <div class="mb-3">
                   <label class="form-control-label">New Password: <span class="tx-danger">*</span></label>
                   <input type="password" name="new_password" class="form-control @error('new_password')is-invalid @enderror" placeholder="Enter new password ">
                   @error('new_password')
                    <div class="text-danger">{{$message}}</div>
                   @enderror
                </div>
                <div class="mb-3">
                   <label class="form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
                   <input type="password" name="password_confirmation" class="form-control @error('password_confirmation')is-invalid @enderror" placeholder="Re-type your new password">
                   @error('password_confirmation')
                    <div class="text-danger">{{$message}}</div>
                   @enderror
                </div>
                <button type="submit" class="btn btn-secondary">Update</button>
              </form>
          </div><!-- card-body -->
      </div>
    </div>
  </div>

@endsection
