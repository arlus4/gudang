<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Web Gudangbaja" />
    <meta name="author" content="Gudangbaja" />
    <title>Gudang Baja | Prototype</title>
    <!-- google font -->
    <link href="{{ asset('assets/fonts.googleapis.com/css6079.css?family=Poppins:300,400,500,600,700') }}" rel="stylesheet" type="text/css" />
    <!-- icons -->
    <link href="{{ asset('assets/fonts/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/fonts/material-design-icons/material-icon.css') }}" rel="stylesheet" type="text/css" />
    <!--bootstrap -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/summernote/summernote.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/flatpicker/css/flatpickr.min.css') }}" rel="stylesheet" />
    <!-- Material Design Lite CSS -->
    <link href="{{ asset('assets/plugins/material/material.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/material_style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet" media="screen">
    <!-- inbox style -->
    <link href="{{ asset('assets/css/pages/inbox.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Theme Styles -->
    <link href="{{ asset('assets/css/theme/dark/theme_style.css') }}" rel="stylesheet" id="rt_style_components" type="text/css" />
    <link href="{{ asset('assets/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme/dark/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme/dark/theme-color.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/css/pages/formlayout.css') }}" rel="stylesheet" type="text/css" />
    <!-- data tables -->
    <link href="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- dropzone -->
    <link href="{{ asset('assets/plugins/dropzone/dropzone.css') }}" rel="stylesheet" media="screen">
    <!--tagsinput-->
    <link href="{{ asset('assets/plugins/jquery-tags-input/jquery-tags-input.css') }}" rel="stylesheet">
    <!-- Date Time item CSS -->
    <link href="{{ asset('assets/plugins/flatpicker/css/flatpickr.min.css') }}" rel="stylesheet" />
    <!--select2-->
    <link href="{{ asset('assets/plugins/select2/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="shortcut icon" />
</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-dark dark-sidebar-color logo-dark dark-theme">
    <div class="page-wrapper">

        @include('kasir/layouts/header')

        <!-- start page container -->
        <div class="page-container">
            @include('kasir/layouts/sidebar')
            @yield('kasir/index')
        </div>
        <!-- end page container -->

        <!-- start footer -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2017 &copy; Smart University Theme By
                <a href="https://radixtouch.com/cdn-cgi/l/email-protection#4436212037302536302c212921042329252d286a272b29"
                    target="_top" class="makerCss">Redstar Theme</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- end footer -->
        
    </div>

    <!-- start js include path -->
    <script src="{{ asset('assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}" data-cfasync="false"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-blockui/jquery.blockui.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sparkline/jquery.sparkline.js') }}"></script>
    <script src="{{ asset('assets/js/pages/sparkline/sparkline-data.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/datepicker-init.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}" charset="UTF-8"></script>
    <script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker-init.js') }}" charset="UTF-8"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker-init.js') }}" charset="UTF-8"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
    <!-- Common js-->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <script src="{{ asset('assets/js/theme-color.js') }}"></script>
    <!-- Material -->
    <script src="{{ asset('assets/plugins/material/material.min.js') }}"></script>
	<script src="{{ asset('assets/js/pages/material-select/getmdl-select.js') }}"></script>
	<script src="{{ asset('assets/plugins/flatpicker/js/flatpicker.min.js') }}"></script>
	<script src="{{ asset('assets/js/pages/date-time/date-time.init.js') }}"></script>
    <script src="{{ asset('assets/plugins/material/material.min.js') }}"></script>
    <!--apex chart-->
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
	<!-- Page Specific JS File -->
	<script src="{{ asset('assets/js/pages/chart/apex/apexcharts.data.js') }}"></script>
    <!-- summernote -->
    <script src="{{ asset('assets/plugins/summernote/summernote.js') }}"></script>
    <script src="{{ asset('assets/js/pages/summernote/summernote-data.js') }}"></script>
    <!-- data tables -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/table/table_data.js') }}"></script>
    <!-- dropzone -->
    <script src="{{ asset('assets/plugins/dropzone/dropzone.js') }}"></script>
	<script src="{{ asset('assets/plugins/dropzone/dropzone-call.js') }}"></script>
    <!--tags input-->
    <script src="{{ asset('assets/plugins/jquery-tags-input/jquery-tags-input.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-tags-input/jquery-tags-input-init.js') }}"></script>
    <!--select2-->
    <script src="{{ asset('assets/plugins/select2/js/select2.js') }}"></script>
    <script src="{{ asset('assets/js/pages/select2/select2-init.js') }}"></script>
    <!-- end js include path -->
</body>


</html>
