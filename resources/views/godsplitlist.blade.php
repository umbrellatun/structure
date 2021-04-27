<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gradient Able bootstrap admin template by codedthemes</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- select2 css -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/select2.min.css')}}">
    <!-- prism css -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/prism-coy.css')}}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> --}}
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/plugins/daterangepicker.css')}}">
    <style>
    .process-step .btn:focus{outline:none}
    .process{display:table;width:100%;position:relative}
    .process-row{display:table-row}
    .process-step button[disabled]{opacity:1 !important;filter: alpha(opacity=100) !important}
    .process-row:before{top:40px;bottom:0;position:absolute;content:" ";width:100%;height:1px;background-color:#ccc;z-order:0}
    .process-step{display:table-cell;text-align:center;position:relative}
    .process-step p{margin-top:4px}
    .btn-circle{width:80px;height:80px;text-align:center;font-size:12px;border-radius:50%}
    @font-face {
         font-family: myFirstFont;
         src: url({{ asset('font/SukhumvitSet-Medium.ttf') }});
    }
    body{
         font-family: myFirstFont, sans-serif;
    }
    .preloader
    {
         position: fixed;
         left: 0px;
         top: 0px;
         width: 100%;
         height: 100%;
         z-index: 9999;
         background: url('../../../public/assets/images/Pulse-1s-200px.gif') 50% 50% no-repeat rgb(249,249,249);
         opacity: .8;
    }
    </style>


</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar theme-horizontal menu-light brand-blue" style="display: none;">

    </nav>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg header-blue navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a href="#!" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="{{asset('assets/images/logo.png')}}" alt="" class="logo">
                <img src="{{asset('assets/images/logo-icon.png')}}" alt="" class="logo-thumb">
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
    </header>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content" >
            <div class="page-wrapper">
                <!-- [ Main Content ] start -->
                <div class="row">
                     <div class="col-md-12">
                          <div class="card">
                               <div class="card-header">
                                    <h5>{{$title}}</h5>
                               </div>
                               <div class="card-body">
                                    <div class="dt-responsive table-responsive">
                                       <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                              <tr>
                                                   <th class="border-top-0">เลขที่เอกสาร</th>
                                                   <th class="border-top-0">วันที่เอกสาร</th>
                                                   <th class="border-top-0">วันที่นัดส่ง</th>
                                                   <th class="border-top-0">รหัสลูกค้า</th>
                                                   <th class="border-top-0">รหัสพนักงานขาย</th>
                                                   <th class="border-top-0">รหัสสินค้า</th>
                                                   <th class="border-top-0">action</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                 @foreach ($headers as $key => $header)
                                                      <tr>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                           <td></td>
                                                      </tr>
                                                 @endforeach
                                            </tbody>
                                       </table>
                                    </div>
                               </div>
                          </div>
                     </div>
                </div>
                <!-- [ Main Content ] end -->
            </div>
        </div>
    </div>
        <!-- Required Js -->
        <script src="{{asset('assets/js/vendor-all.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/pcoded.min.js')}}"></script>
        <script src="{{asset('assets/js/menu-setting.min.js')}}"></script>

        <!-- jquery-validation Js -->
        <script src="{{asset('assets/js/plugins/jquery.validate.min.js')}}"></script>
        <!-- sweet alert Js -->
        <script src="{{asset('assets/js/plugins/sweetalert.min.js')}}"></script>
        <!-- datepicker js -->
        <script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins/daterangepicker.js')}}"></script>
        <!-- prism Js -->
        <script src="{{asset('assets/js/plugins/prism.js')}}"></script>
        <script src="{{asset('assets/js/horizontal-menu.js')}}"></script>

        <!-- notification Js -->
        <script src="{{asset('assets/js/plugins/bootstrap-notify.min.js')}}"></script>
        <!-- select2 Js -->
        <script src="{{asset('assets/js/plugins/select2.full.min.js')}}"></script>

</body>

</html>
