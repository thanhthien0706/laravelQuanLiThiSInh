<div class="sidebar-left-info">

    <div class="user-box">
        <div class="d-flex justify-content-center">
            <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="" class="img-fluid rounded-circle">
        </div>
        <div class="text-center text-white mt-2">
            <h6>Travis Watson</h6>
            <p class="text-muted m-0 ">Admin</p>
        </div>
    </div>

    <!--sidebar nav start-->
    <ul class="side-navigation">
        <li>
            <h3 class="navigation-title">Management</h3>
        </li>
        <li class=" @yield('status_avtive_nav_student') ">
            <a href=" {{ route('sinhvien.index') }} "><i class="mdi mdi-gauge"></i> <span>Students</span></a>
        </li>
    </ul>
    <!--sidebar nav end-->
</div>