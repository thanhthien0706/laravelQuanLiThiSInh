<!DOCTYPE html>
<html lang="en">
<head>
    @include('admins/includes/head')
    <title> @yield('main_title') </title>
    @include('admins/includes/stylelink')
</head>
<body class="sticky-header box_master_category">

    @include('admins/includes/alerts');

    <section>
        <!-- sidebar left start-->
        <div class="sidebar-left box_main_left">
            @include('admins/includes/slidebarleft')
        </div>

        <!-- body content start-->
        <div class="body-content box_main_right">
            @include('admins/includes/headermasteright')
            
            @yield('main_content')
        </div>
    </section>
    
    @include('admins/includes/js_page')
</body>
</html>