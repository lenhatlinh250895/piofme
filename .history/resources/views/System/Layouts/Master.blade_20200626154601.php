<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@yield('title') | Tập đoàn VSETGROUP</title>
        <meta content="VSETGROUP" name="description" />
        <meta content="VSETGROUP" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <base href="{{asset('')}}">
        <link rel="shortcut icon" href="vset/images/page/landing page-10.png">

        <link rel="stylesheet" href="assets/plugins/metro/MetroJs.min.css">
        <link rel="stylesheet" href="assets/plugins/morris/morris.css">
        <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
        <!-- Summernote css -->

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/animate/animate.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css?v={{time()}}" rel="stylesheet" type="text/css">
        
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.css">
	    <link href="notify/sweetalert2.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
        
        
        {{--  <!-- dependencies (Summernote depends on Bootstrap & jQuery) -->
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">     
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">  --}}
        @yield('css')
		<style>
			.note-popover .popover-content .dropdown-menu, .panel-heading.note-toolbar .dropdown-menu{
				min-width: 200px;
				padding: 10px;
			}
			.note-editor .note-btn.dropdown-toggle::after{
				display: none;
			}
		</style>


    </head>


    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <!--<a href="index.html" class="logo"><i class="fa fa-paw"></i> Aplomb</a>-->
                        <a href="index.html" class="logo"><img src="vset/images/page/landing page-10.png" height="50" alt="logo"></a>
                    </div>
                </div>
               

                 @include('Admin.layout.Slide')
                 <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    @include('Admin.layout.Header')
                    <!-- Top Bar End -->

                    <div class="page-content-wrapper">

                        @yield('content')

                    </div> <!-- Page content Wrapper -->

                </div> <!-- content -->
                
                @include('Admin.layout.Footer')

            </div>
            <!-- End Right content here -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

<!--
        <script src="assets/plugins/metro/MetroJs.min.js"></script>
        <script src="assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="assets/plugins/sparkline-chart/jquery.sparkline.min.js"></script>
        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>
        <script src="assets/pages/dashboard.js"></script>
-->


        {{--  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>  --}}

        
        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script src="assets/js/jquery.nestable.js"></script>
		<script src="notify/sweetalert2.min.js?v={{time()}}"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.js"></script>
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
	<!--     <script src="js/animation.js"></script> -->
		<script>
		$(document).ready(function(){
			//$('#myModal').modal('show');
			@if(Session::get('flash_level') == 'success')
				toastr.success('{{ Session::get('flash_message') }}', 'Success!', {timeOut: 3500})
			@elseif(Session::get('flash_level') == 'error')
				toastr.error('{{ Session::get('flash_message') }}', 'Error!', {timeOut: 3500})
			@endif
		
			@if (count($errors) > 0)
				@foreach ($errors->all() as $error)
					toastr.error('{{$error}}', 'Error!', {timeOut: 3500})
				@endforeach
			@endif
		});
	  </script>
        
        @yield('script')
    </body>
</html>