@extends('admin.admin-app')

@section('title', 'Change Password')
 
{{-- $2y$10$FDu7iDKnfta6E/m1yZnDxOHINoPtTym89Z49SEDPe5ks33eJ0LeNW --}}

@section('content')
  @if(session()->has('success'))
      <div class="alert alert-success col-lg-6">
          {{ session()->get('success') }}
      </div>
  @endif
<div class="row">



  <div class="col-lg-6">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">Change Password</h5>
      </div>
      <div class="card-body">
        <div class="">
           <form class="" method="POST" action="{{route('admin.change_password_submit')}}" autocomplete="off">
                @csrf
                  <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="text" class="form-control @error('current_password')is-invalid @enderror" id="current_password" name="current_password" placeholder="Enter Old Password" autocomplete="off">
                    @error('current_password')
                        <span id="current_password-error" class="invalid-feedback" role="alert">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" class="form-control @error('new_password')is-invalid @enderror" id="new_password" name="new_password" placeholder="New Password" autocomplete="off">

                    @error('new_password')
                        <span id="new_password-error" class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label for="confirm_new_password">Confirm New Password</label>
                    <input type="password" class="form-control @error('confirm_new_password')is-invalid @enderror" id="confirm_new_password" name="confirm_new_password" placeholder="Confirm New Password" autocomplete="off">

                    @error('confirm_new_password')
                        <span id="confirm_new_password-error" class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                  </div>
                  

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
        <!-- /.row -->
@endsection


@section('page_header')

<div class="col-sm-6">
    <h1 class="m-0">Change Password</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
      <li class="breadcrumb-item active">Change Password</li>
    </ol>
  </div>
@endsection
