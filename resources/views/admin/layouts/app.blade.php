<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
       <!-- <meta name="_token" content="{{ csrf_token() }}"  /> -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Web App | Dashboard</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{ asset('admin_assets/admin_panel/assets/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/admin_panel/assets/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/admin_panel/assets/plugins/summernote/summernote-bs4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/admin_panel/assets/plugins/jquery-ui/jquery-ui.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_assets/admin_panel/assets/css/custom.css ') }}">       
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="{{ route('admin.dashboard') }}" role="button"><i class="fas fa-bars"></i></a>
                    </li>                    
                </ul>                         
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="{{ route('admin.dashboard') }}" class="brand-link bg-white" style="height: 57px;">
					<!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
					<img src="{{asset('admin_assets/images/logo.png')}}" alt="" class="w-75 ml-3" style="margin-top:-20px">
					<!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
				  </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('services.list')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Services</p>
                                </a>
                            </li>
							<li class="nav-item">
                                <a href="{{ route('blog.list')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Blogs</p>
                                </a>
                            </li>
							<li class="nav-item">
                                <a href="{{ route('faq.list')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Faq</p>
                                </a>
                            </li>
							<li class="nav-item">
                                <a href="{{ route('page.list')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Pages</p>
                                </a>
                            </li>
							<li class="nav-item">
                                <a href="{{ route('setting.list')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Settings</p>
                                </a>
                            </li>  
                            <li class="nav-item">
                                <a href="{{ route('admin.logout')}}" class="nav-link">
                                    <i class='fas fa-sign-out-alt nav-icon'></i>

                                    <p>Logout</p>
                                </a>
                            </li>                          
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>
           
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            @yield('content')
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2022 </strong>All rights reserved.
            </footer>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        
        <script src="{{ asset('admin_assets/admin_panel/assets/plugins/jquery/jquery.min.js') }}"></script>

        <script src="{{ asset('admin_assets/admin_panel/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin_assets/admin_panel/assets/js/adminlte.min.js?v=3.2.0') }}"></script>
        <!-- Summernote -->
        <script src="{{ asset('admin_assets/admin_panel/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <script src="{{ asset('admin_assets/admin_panel/assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

        <script src="{{ asset('admin_assets/admin_panel/assets/plugins/dropzone/dropzone.js') }}"></script>
        <script type="text/javascript">
           $(document).ready(function(){

            $(".summernote").summernote({

             height:300

            });});

          
            // $("#createServiceForm").submit(function(event){
            //     event.preventDefault();
            //     $.ajax({
            //         url:'{{ url("/admin/service/createPost") }}',
            //         type:'POST',
            //         dataType:'json',
            //         data:$("#createServiceForm").serializeArray(),
            //         success:function(response){
            //             if(response.status == 200){

            //             }else{
            //                 $('.name-error').html(response.errors.name);
            //             }
            //         }
            //     })
            // })
        </script>
   @yield('extraJs')

    </body>
</html>