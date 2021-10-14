<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<!-- <script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script> -->
<script src=" {{ asset('assets/js/popper.min.js') }} "></script>
<script src=" {{ asset('assets/js/bootstrap.min.js') }} "></script>
<script src=" {{ asset('assets/js/jquery-migrate.js')}}"></script>
<!-- <script src=" {{ asset('assets/js/modernizr.min.js')}}"></script> -->
<script src=" {{ asset('assets/js/jquery.slimscroll.min.js')}}"></script>
<script src=" {{ asset('assets/js/slidebars.min.js') }}"></script>
<!--plugins js-->
<script src=" {{ asset('assets/plugins/counter/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sparkline-chart/jquery.sparkline.min.js') }}"></script>
<script src=" {{ asset('assets/pages/jquery.sparkline.init.js') }}"></script>

<script src=" {{ asset('assets/plugins/chart-js/Chart.bundle.js') }} "></script>
<script src="{{ asset('assets/plugins/morris-chart/raphael-min.js') }}"></script>
<script src=" {{ asset('assets/plugins/morris-chart/morris.js') }} "></script>
<script src=" {{ asset('assets/pages/dashboard-init.js') }} "></script>


<!--app js-->
<!-- <script src=" {{ asset('assets/js/jquery.app.js') }} "></script> -->
<script>
    jQuery(document).ready(function($) {
        $('.counter').counterUp({
            delay: 100,
            time: 1200
        });
    });
</script>

<script src=" {{ asset('js/app.js') }} "></script>