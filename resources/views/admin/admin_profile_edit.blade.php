@extends('admin.admin_master')
@section('admin')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Update Profil</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="{{route('store.profile')}}" enctype="multipart/form-data"> @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputEmail3" name="name" value="{{$editData->name}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3"  name="email" value="{{$editData->email}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">profil image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="image" placeholder="Email" name="profile_image">
                    </div>
                    <div class="image">
                      <img id="showimage" src="{{asset('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image" style="border-radius: 50%; object-fit: cover; max-height: 200px;">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <button type="submit" class="btn btn-primary">Update Profile</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
          </div>
          <script type="text/javascript">
            $(document).ready(function(){
              $('#image').change(function(e){
                let reader = new FileReader()
                reader.onload = function(e){
                  $('#showimage').attr('src', e.target.result)
                }
                reader.readAsDataURL(e.target.files['0'])
              })
            })
          </script>
@endsection
