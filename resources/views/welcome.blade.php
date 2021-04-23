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

    <!-- prism css -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/prism-coy.css')}}">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> --}}
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
                <img src="assets/images/logo.png" alt="" class="logo">
                <img src="assets/images/logo-icon.png" alt="" class="logo-thumb">
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                    <div class="search-bar">
                        <input type="text" class="form-control border-0 shadow-none" placeholder="Search here">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a>
                </li>
            </ul>

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
                                    <h5>Wizard with Validation</h5>
                               </div>
                               <div class="card-body">
                                   <div class="bt-wizard" id="besicwizard">
                                       <ul class="nav nav-pills nav-fill mb-3">
                                           <div class="process mb-5">
                                                <div class="process-row nav nav-tabs">
                                                     <div class="process-step">
                                                          <button type="button" class="btn btn-info btn-circle" id="icon-1" data-toggle="tab" disabled><i class="fa fa-info fa-3x"></i></button>
                                                          <p><small>Fill<br />information</small></p>
                                                     </div>
                                                     <div class="process-step">
                                                          <button type="button" class="btn btn-default btn-circle" id="icon-2" data-toggle="tab" disabled><i class="fa fa-file-text-o fa-3x"></i></button>
                                                          <p><small>Fill<br />description</small></p>
                                                     </div>
                                                     <div class="process-step">
                                                          <button type="button" class="btn btn-default btn-circle" id="icon-3" data-toggle="tab"><i class="fa fa-image fa-3x"></i></button>
                                                          <p><small>Upload<br />images</small></p>
                                                     </div>
                                                     <div class="process-step">
                                                          <button type="button" class="btn btn-default btn-circle" id="icon-4" data-toggle="tab"><i class="fa fa-cogs fa-3x"></i></button>
                                                          <p><small>Configure<br />display</small></p>
                                                     </div>
                                                     <div class="process-step">
                                                          <button type="button" class="btn btn-default btn-circle" id="icon-5" data-toggle="tab"><i class="fa fa-check fa-3x"></i></button>
                                                          <p><small>Save<br />result</small></p>
                                                     </div>
                                                </div>
                                           </div>
                                      </ul>
                                      <div class="tab-content">
                                           <div id="menu1" class="tab-pane fade in active">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="card">
                                                              <div class="card-header">
                                                                   <h5>ข้อมูลลูกค้า</h5>
                                                                   <hr/>
                                                              </div>
                                                              <div class="card-body">
                                                                   <div class="form-row">
                                                                        <div class="col-md-3 mb-3">
                                                                             <label for="validationTooltip01">เลขที่เอกสาร</label>
                                                                             <input type="text" class="form-control" id="validationTooltip01" placeholder="" value="" required>
                                                                        </div>
                                                                        <div class="col-md-3 mb-3">
                                                                             <label for="document_date">วันที่เอกสาร</label>
                                                                             <input type="text" class="form-control" name="document_date" placeholder="" value="" required>
                                                                        </div>
                                                                        <div class="col-md-3 mb-3">
                                                                             <label for="send_appointment">วันที่นัดส่ง</label>
                                                                             <input type="text" class="form-control" name="send_appointment" value="" required />
                                                                        </div>
                                                                        <div class="col-md-3 mb-3">
                                                                             <label for="customer_code">รหัสลูกค้า</label>
                                                                             <input type="text" name="customer_code" value="" class="form-control" />
                                                                        </div>
                                                                   </div>
                                                                   <div class="form-row">
                                                                        <div class="col-md-6 mb-3">
                                                                             <label for="sale_code">รหัสพนักงานขาย</label>
                                                                             <input type="text" class="form-control" name="sale_code" placeholder="" value="" required>
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                             <label for="product_code">รหัสสินค้า</label>
                                                                             <input type="text" class="form-control" name="product_code" placeholder="" value="" required>
                                                                        </div>
                                                                   </div>
                                                              </div>

                                                         </div>
                                                    </div>
                                               </div>
                                                <ul class="list-unstyled list-inline pull-right">
                                                     <li><button type="button" class="btn btn-info next-step" data-id="1" id="next-step-1">Next <i class="fa fa-chevron-right"></i></button></li>
                                                </ul>
                                           </div>
                                           <div id="menu2" class="tab-pane fade">
                                                <h3>Menu 2</h3>
                                                <p>Some content in menu 2.</p>
                                                <ul class="list-unstyled list-inline pull-right">
                                                     <li><button type="button" class="btn btn-default prev-step" data-id="2" id="prev-step-2"><i class="fa fa-chevron-left"></i> Back</button></li>
                                                     <li><button type="button" class="btn btn-info next-step" data-id="2" id="next-step-2">Next <i class="fa fa-chevron-right"></i></button></li>
                                                </ul>
                                           </div>
                                           <div id="menu3" class="tab-pane fade">
                                                <h3>Menu 3</h3>
                                                <p>Some content in menu 3.</p>
                                                <ul class="list-unstyled list-inline pull-right">
                                                     <li><button type="button" class="btn btn-default prev-step" data-id="3" id="prev-step-3"><i class="fa fa-chevron-left"></i> Back</button></li>
                                                     <li><button type="button" class="btn btn-info next-step" data-id="3" id="next-step-3">Next <i class="fa fa-chevron-right"></i></button></li>
                                                </ul>
                                           </div>
                                           <div id="menu4" class="tab-pane fade">
                                                <h3>Menu 4</h3>
                                                <p>Some content in menu 4.</p>
                                                <ul class="list-unstyled list-inline pull-right">
                                                     <li><button type="button" class="btn btn-default prev-step" data-id="4" id="prev-step-4"><i class="fa fa-chevron-left"></i> Back</button></li>
                                                     <li><button type="button" class="btn btn-info next-step" data-id="4" id="next-step-4">Next <i class="fa fa-chevron-right"></i></button></li>
                                                </ul>
                                           </div>
                                           <div id="menu5" class="tab-pane fade">
                                                <h3>Menu 5</h3>
                                                <p>Some content in menu 5.</p>
                                                <ul class="list-unstyled list-inline pull-right">
                                                     <li><button type="button" class="btn btn-default prev-step" data-id="5" id="prev-step-5"><i class="fa fa-chevron-left"></i> Back</button></li>
                                                     <li><button type="button" class="btn btn-success" data-id="5" id="next-step-5"><i class="fa fa-check"></i> Done!</button></li>
                                                </ul>
                                           </div>
                                      </div>
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

        <script src="{{asset('assets/js/plugins/jquery.bootstrap.wizard.min.js')}}"></script>


        <!-- prism Js -->
        <script src="{{asset('assets/js/plugins/prism.js')}}"></script>
        <script src="{{asset('assets/js/horizontal-menu.js')}}"></script>
    <script>


        $(document).ready(function() {
            $("#pcoded").pcodedmenu({
                themelayout: 'horizontal',
                MenuTrigger: 'hover',
                SubMenuTrigger: 'hover',
            });


        });

        $(function(){
             $('.btn-circle').on('click',function(){
                  $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
                  $(this).addClass('btn-info').removeClass('btn-default').blur();
             });

             $('.next-step').on('click', function (e){
                  e.preventDefault();
                  var data = $(this).data("id");
                  var next = data+1;
                  $("#menu" + data).removeClass('active');
                  $("#menu" + data).removeClass('in');
                  $("#menu" + next).addClass('active');
                  $("#menu" + next).addClass('in');

                  $("#icon-"+data).removeClass('btn-info').addClass('btn-default');
                  $("#icon-"+next).addClass('btn-info').removeClass('btn-default');
             });
             $('.prev-step').on('click', function (e){
                  e.preventDefault();
                  var data = $(this).data("id");
                  var prev = data-1;

                  $("#menu" + data).removeClass('active');
                  $("#menu" + data).removeClass('in');
                  $("#menu" + prev).addClass('active');
                  $("#menu" + prev).addClass('in');

                  $("#icon-"+data).removeClass('btn-info').addClass('btn-default');
                  $("#icon-"+prev).addClass('btn-info').removeClass('btn-default');
             });
        });
    </script>

    <script src="{{asset('assets/js/analytics.js')}}"></script>

</body>

</html>
