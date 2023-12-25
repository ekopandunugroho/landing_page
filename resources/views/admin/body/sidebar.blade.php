<aside class="main-sidebar sidebar-dark-primary elevation-4">
    @php
          $id = Auth::user()->id;
          $adminData = App\Models\User::find($id);
          $profileImage = $adminData->profile_image ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/no_image.jpg');
    @endphp

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ isset($adminData->profile_image)? url('upload/admin_images/' . $adminData->profile_image) : url ('upload/no_image.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.profile')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Edit Profile</p>
                </a>
              </li>
              
            </ul>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>