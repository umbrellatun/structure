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
                                    <h5>{{$title}}</h5>
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
                                                                   <div class="form-row form-1 needs-validation" novalidate>
                                                                        <div class="col-md-3 mb-3">
                                                                             <label for="DocuNO">เลขที่เอกสาร</label>
                                                                             <input type="text" class="form-control" name="DocuNO" id="DocuNO" value="{{$result->DocuNO}}" required>
                                                                        </div>
                                                                        <div class="col-md-3 mb-3">
                                                                             <label for="DocuDate">วันที่เอกสาร</label>
                                                                             <input type="text" class="form-control" name="DocuDate" id="DocuDate" value="{{$result->DocuDate}}" required>
                                                                        </div>
                                                                        <div class="col-md-3 mb-3">
                                                                             <label for="send_appointment">วันที่นัดส่ง</label>
                                                                             <input type="text" class="form-control" name="send_appointment" id="send_appointment" value="" required />
                                                                        </div>
                                                                        <div class="col-md-3 mb-3">
                                                                             <label for="CustCode">รหัสลูกค้า</label>
                                                                             <input type="text" name="CustCode" id="CustCode" value="{{$result->CustCode}}" class="form-control" required />
                                                                        </div>
                                                                   </div>
                                                                   <div class="form-row form-1 needs-validation" novalidate>
                                                                        <div class="col-md-6 mb-3">
                                                                             <label for="EmpCode">รหัสพนักงานขาย</label>
                                                                             <input type="text" name="EmpCode" id="EmpCode" value="{{$result->EmpCode}}" class="form-control" required>
                                                                        </div>
                                                                        <div class="col-md-6 mb-3">
                                                                             <label for="GoodCode">รหัสสินค้า</label>
                                                                             <select class="form-control" name="GoodCode" id="GoodCode" required>
                                                                                  @foreach ($products as $key => $product)
                                                                                       <option value="{{$product->GoodCode}}">{{$product->GoodCode}} {{$product->GoodName1}}</option>
                                                                                  @endforeach
                                                                             </select>
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
    <script>
     var url_gb = '{{ url('') }}'

        $(document).ready(function() {
            $("#pcoded").pcodedmenu({
                themelayout: 'horizontal',
                MenuTrigger: 'hover',
                SubMenuTrigger: 'hover',
            });

            $("#send_appointment").daterangepicker({
                 singleDatePicker: true,
                 showDropdowns: true,
                 minYear: 2020,
                 maxYear: parseInt(moment().format('YYYY'),10),
                 locale: {
                    format: 'DD MMM YYYY'
                }
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
                  if (data == 1){
                       if (!$('#DocuNO').val()) {
                          $('#DocuNO').focus();
                          $('.form-1').addClass('was-validated');
                          return false;
                      }
                       if (!$('#DocuDate').val()) {
                          $('#DocuDate').focus();
                          $('.form-1').addClass('was-validated');
                          return false;
                      }
                       if (!$('#send_appointment').val()) {
                          $('#send_appointment').focus();
                          $('.form-1').addClass('was-validated');
                          return false;
                      }
                       if (!$('#CustCode').val()) {
                          $('#CustCode').focus();
                          $('.form-1').addClass('was-validated');
                          return false;
                      }
                       if (!$('#EmpCode').val()) {
                          $('#EmpCode').focus();
                          $('.form-1').addClass('was-validated');
                          return false;
                      }
                       if (!$('#GoodCode').val()) {
                          $('#GoodCode').focus();
                          $('.form-1').addClass('was-validated');
                          return false;
                      }
                      $.ajax({
                           method : "post",
                           url : '{{ route('customer.get_cust_code')}}',
                           dataType : 'json',
                           data : {"CustCode" : $("#CustCode").val(), "GoodCode": $("#GoodCode").val(), "ShipDate": $("#send_appointment").val()},
                           headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                           },
                           beforeSend: function() {
                                $("#preloaders").css("display", "block");
                           },
                      }).done(function(rec){
                           $("#preloaders").css("display", "none");
                           // if(rec.status==1){
                                // swal("", rec.content, "success").then(function(){
                                //      window.location.href = "{{ route('user') }}";
                                // });
                           // } else {
                                // swal("", rec.content, "warning");
                           // }
                      }).fail(function(){
                           $("#preloaders").css("display", "none");
                           swal("", rec.content, "error");
                      });
                  }

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


</body>

</html>
