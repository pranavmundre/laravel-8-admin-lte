@extends('admin.admin-app')

@section('title', 'My Profile')
 

@section('head_script')
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@endsection

@section('page_header')
<div class="col-sm-6">
    <h1 class="m-0">My Profile</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
      <li class="breadcrumb-item active">My Profile</li>
    </ol>
  </div>
@endsection


@section('content')

@if(Session::get('user_status'))
    <div class="alert alert-success" >
        {{Session::get('user_status')}}
    </div>
@endif

<div class="row">
  <div class="col-lg-4">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">My Profile</h5>
      </div>
      <div class="card-body">
        <div class="">
            <div class="text-center">
              @if($user['profile_pic'])
                <img class="profile-user-img img-fluid img-circle"
                   src="{{ asset($user['profile_pic'])}}"
                   alt="User profile picture">
          
              @else
                <img class="profile-user-img img-fluid img-circle"
                   src="{{ asset('admin-lte/dist/img/default-150x150.png')}}"
                   alt="User profile picture">
              @endif

                </div>
            <div class="">
              <h3 class="profile-username text-center">
                {{$user['firstname']}} {{$user['lastname']}}
              </h3>

              <hr>
              
              <p>
                <strong>Email: </strong> {{$user['email']}}
              </p>
              <p>
                <strong>Mobile:</strong> {{$user['mobile_no']}}
              </p>

              <p>
                <strong>Created at:</strong> {{$user['created_at']}}
              </p>
              <p>
                <strong>Updated at:</strong> {{$user['updated_at']}}
              </p>
              
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-8">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <div class="d-flex justify-content-between">
          
        <h5 class="m-0">Details</h5>
         <button type="button" class="btn btn-warning float-right" id="edit_user_btn">Edit</button>
        </div>

      </div>
      <div class="card-body">
          <form class="form-horizontal" id="update_user" action="{{route('admin.update_profile')}}" method="post" enctype='multipart/form-data'>
            @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="firstname" class="col-sm-3 col-form-label">First Name</label>
                    <div class="col-sm-9">
                      <input type="text" value="{{$user['firstname']}}" class="form-control @error('firstname')is-invalid @enderror" id="firstname" name="firstname" readonly>
                      @error('firstname')
                        <span id="firstname-error" class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="lastname" class="col-sm-3 col-form-label">Last Name</label>
                    <div class="col-sm-9">
                      <input type="text" value="{{$user['lastname']}}" class="form-control @error('lastname')is-invalid @enderror" id="lastname" name="lastname" readonly>
                      @error('lastname')
                        <span id="lastname-error" class="error invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="text" value="{{$user['email']}}" class="form-control" id="email" name="email"  readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="mobile_no" class="col-sm-3 col-form-label">Mobile No.</label>
                    <div class="col-sm-9">
                      <input type="text" value="{{$user['mobile_no']}}" class="form-control" id="mobile_no" name="mobile_no" readonly>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="profile_pic" class="col-sm-3 col-form-label">Profile Picture</label>
                    <div class="col-sm-9">
                        <div class="input-group @error('profile_pic')is-invalid @enderror">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input @error('profile_pic')is-invalid @enderror" id="profile_pic" name="profile_pic" accept="image/*" readonly>

                            <label class="custom-file-label " for="profile_pic">Choose Profile Picture</label>

                          </div>
                        </div>
                          @error('profile_pic')
                            <span id="profile_pic-error" class="error invalid-feedback">{{ $message }}</span>
                          @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Is SuperAdmin</label>
                    <div class="col-sm-9 form-group">
                      <div class="icheck-primary ">
                        <input type="checkbox" checked="{{$user['is_superuser']}}" class="" id="is_superuser" name="is_superuser" onclick="return false;" onkeydown="return false;">
                        <label for="is_superuser"></label>
                      </div>
                    </div>
                  </div>
                  
                  {{-- <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                      </div>
                    </div>
                  </div> --}}
                </div>


                <div class="col-lg-12">
                  <button type="submit" name="submit" class="btn btn-info float-right" disabled>Update</button>
                  <button type="button" name="cancle" id="cancle_update" class="btn btn-info float-right mr-2" style="display:none;">Cancle</button>
                </div>
              </form>
        
      </div>
    </div>
  </div>
</div>
        <!-- /.row -->
@endsection


@section('footer_script')
<script src="{{ asset('admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<script>

$(function () {
  $('#edit_user_btn').click(function(){
    $('form#update_user button, form#update_user input[type=checkbox]').removeAttr('disabled');
    $('form#update_user input').removeAttr('readonly');
    $('#cancle_update').slideDown();
  });

  $('#cancle_update').click(function(){
    $('form#update_user button, form#update_user input[type=checkbox]').attr('disabled', 'true');
    $('form#update_user input').attr('readonly', 'true');
    $('#cancle_update').hide();

  });
  

  $(".alert").delay(4000).slideUp(200, function() {
      $(this).alert('close');
  });

$(function () {
  bsCustomFileInput.init();
});

});

</script>

@endsection

