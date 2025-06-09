<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{secure_asset('assets/images/brand/favicon.ico')}}" />

    <!-- TITLE -->
    <title>Sash – Bootstrap 5 Admin & Dashboard Template</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{secure_asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{secure_asset('assets/css/card.css')}}" rel="stylesheet" />
    <link href="{{secure_asset('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{secure_asset('assets/css/dark-style.css')}}" rel="stylesheet" />
    <link href="{{secure_asset('assets/css/transparent-style.css')}}" rel="stylesheet">
    <link href="{{secure_asset('assets/css/skin-modes.css')}}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{secure_asset('assets/css/icons.css')}}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{secure_asset('assets/colors/color1.css')}}" />

    <!-- INTERNAL Switcher css -->
    <link href="{{secure_asset('assets/switcher/css/switcher.css')}}" rel="stylesheet" />
    <link href="{{secure_asset('assets/switcher/demo.css')}}" rel="stylesheet" />

</head>

<body class="app sidebar-mini ltr">
                @include('layouts.topmenu')
                @include('layouts.leftmenu')    
    <!-- PAGE -->

    <div class="main-content app-content mt-0">
        <div class="side-app">
            <div class="main-container container-fluid">
                @yield('content')
            </div>
        </div>
    </div>


    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{secure_asset('assets/js/jquery.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{secure_asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{secure_asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{secure_asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

	<!-- TypeHead js -->
	<script src="{{secure_asset('assets/plugins/bootstrap5-typehead/autocomplete.js')}}"></script>
    <script src="{{secure_asset('assets/js/typehead.js')}}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{secure_asset('assets/plugins/sidebar/sidebar.js')}}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{secure_asset('assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
    <script src="{{secure_asset('assets/plugins/p-scroll/pscroll.js')}}"></script>
    <script src="{{secure_asset('assets/plugins/p-scroll/pscroll-1.js')}}"></script>

    <!-- Color Theme js -->
    <script src="{{secure_asset('assets/js/themeColors.js')}}"></script>

    <!-- Sticky js -->
    <script src="{{secure_asset('assets/js/sticky.js')}}"></script>

    <!-- CUSTOM JS -->
    <script src="{{secure_asset('assets/js/custom1.js')}}"></script>

    <!-- Switcher js -->
    <script src="{{secure_asset('assets/switcher/js/switcher.js')}}"></script>

    @yield('scripts')

</body>

</html>