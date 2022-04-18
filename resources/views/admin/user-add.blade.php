@extends('admin.admin-app')

@section('title', 'Add User')
 
{{-- $2y$10$FDu7iDKnfta6E/m1yZnDxOHINoPtTym89Z49SEDPe5ks33eJ0LeNW --}}

@section('content')
  @if(session()->has('success'))
      <div class="alert alert-success col-lg-6">
          {{ session()->get('success') }}
      </div>
  @endif
  
  @if(session()->has('error'))
      <div class="alert alert-error col-lg-6">
          {{ session()->get('error') }}
      </div>
  @endif
<div class="row">



  <div class="col-lg-6">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">Add User</h5>
      </div>
      <div class="card-body">
        <div class="">
           <form class="" method="POST" action="{{route('admin.user_add')}}" autocomplete="off">
                @csrf
                  <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control @error('firstname')is-invalid @enderror" id="firstname" name="firstname" placeholder="Enter First Name" autocomplete="off"  value="{{ old('firstname') }}">
                    @error('firstname')
                        <span id="firstname-error" class="invalid-feedback" role="alert">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control @error('lastname')is-invalid @enderror" id="lastname" name="lastname" placeholder="Enter Last Name" autocomplete="off" value="{{ old('lastname') }}">
                    @error('lastname')
                        <span id="lastname-error" class="invalid-feedback" role="alert">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="email">Email ID</label>
                    <input type="text" class="form-control @error('email')is-invalid @enderror" id="email" name="email" placeholder="Enter Email ID" autocomplete="off" value="{{ old('email') }}">
                    @error('email')
                        <span id="email-error" class="invalid-feedback" role="alert">{{ $message }}</span>
                      @enderror
                  </div>
                  <div class="form-group">
                    <label for="mobile_no">Mobile No.</label>
                    <input type="text" class="form-control @error('mobile_no')is-invalid @enderror" id="mobile_no" name="mobile_no" placeholder="Enter  Mobile No." autocomplete="off" value="{{ old('mobile_no') }}">
                    @error('mobile_no')
                        <span id="mobile_no-error" class="invalid-feedback" role="alert">{{ $message }}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control @error('password')is-invalid @enderror" id="password" name="password" placeholder="Enter Password" autocomplete="off">
                    @error('password')
                        <span id="password-error" class="invalid-feedback" role="alert">{{ $message }}</span>
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
    <h1 class="m-0">Add User</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item active">Add User</li>
    </ol>
  </div>
@endsection
