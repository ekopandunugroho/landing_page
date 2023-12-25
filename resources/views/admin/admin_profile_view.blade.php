@extends('admin.admin_master')
@section('admin')
<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Profil</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name : {{$adminData-> name}}</label>                  
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email : {{$adminData->email}}</label>    
                  </div>
                  <div class="form-group">
                    <div class="image">
                      <img src="{{ isset($adminData->profile_image)? url('upload/admin_images/' . $adminData->profile_image) : url ('upload/no_image.jpg') }}"  class="img-circle elevation-2" alt="User Image" style = "width : 200px; object-fit: cover; height:150px;">
                         </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                   <a href="{{route('edit.profile')}}" class="btn btn-primary" style="color: white; text-decoration: none;">Edit Profile</a>
                </div>

              </form>
            </div>
            <!-- /.card -->

          </div>
@endsection