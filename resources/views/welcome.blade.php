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
        {{-- <div class="collapse navbar-collapse">
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
        </div> --}}
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
                                           <div class="process">
                                                <div class="process-row nav nav-tabs">
                                                     <div class="process-step">
                                                          <button type="button" class="btn btn-info btn-circle" id="icon-1" data-toggle="tab" disabled><h1>1</h1></button>
                                                          <p><small>ข้อมูลลูกค้า</small></p>
                                                     </div>
                                                     <div class="process-step">
                                                          <button type="button" class="btn btn-default btn-circle" id="icon-2" data-toggle="tab" disabled><h1>2</h1></button>
                                                          <p><small>ข้อมูลเอกสาร</small></p>
                                                     </div>
                                                     <div class="process-step">
                                                          <button type="button" class="btn btn-default btn-circle" id="icon-3" data-toggle="tab" disabled><h1>3</h1></button>
                                                          <p><small>แบ่งสินค้าเพื่อจัดส่ง</small></p>
                                                     </div>
                                                     <div class="process-step">
                                                          <button type="button" class="btn btn-default btn-circle" id="icon-4" data-toggle="tab" disabled><h1>4</h1></button>
                                                          <p><small>สรุปข้อมูล</small></p>
                                                     </div>
                                                     {{-- <div class="process-step">
                                                          <button type="button" class="btn btn-default btn-circle" id="icon-5" data-toggle="tab" disabled><h1>5</h1></button>
                                                          <p><small>บันทึก<br />สำเร็จ</small></p>
                                                     </div> --}}
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
                                                                             <input type="text" class="form-control" name="DocuDate" id="DocuDate" value="{{ date_format(date_create($result->DocuDate), "d M Y H:i:s") }}" required>
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
                                                <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="card">
                                                              <div class="card-header">
                                                                   <h5>ข้อมูลเอกสาร</h5>
                                                                   <hr/>
                                                              </div>
                                                              <div class="card-body table-border-style">
                                                                   <div class="table-responsive">
                                                                        <table id="table1" class="table table-striped">
                                                                             <thead>
                                                                                  <tr>
                                                                                       <th>#</th>
                                                                                       <th>เลขที่เอกสาร</th>
                                                                                       <th>วันที่จอง</th>
                                                                                       <th>จำนวนวัน</th>
                                                                                       <th>สถานที่จัดส่ง</th>
                                                                                       <th>ราคา/หน่วย</th>
                                                                                       <th>จำนวนสินค้าสั่งจอง</th>
                                                                                       <th>จำนวนสินค้าต้องการส่ง</th>
                                                                                  </tr>
                                                                             </thead>
                                                                             <tbody>
                                                                             </tbody>
                                                                        </table>
                                                                   </div>
                                                              </div>
                                                         </div>
                                                    </div>
                                               </div>
                                                <ul class="list-unstyled list-inline pull-right">
                                                     <li><button type="button" class="btn btn-default prev-step" data-id="2" id="prev-step-2"><i class="fa fa-chevron-left"></i> Back</button></li>
                                                     <li><button type="button" class="btn btn-info next-step" data-id="2" id="next-step-2">Next <i class="fa fa-chevron-right"></i></button></li>
                                                </ul>
                                           </div>
                                           <div id="menu3" class="tab-pane fade">


                                                <div class="row">
                                                    <div class="col-md-12">
                                                         <div class="card">
                                                              <div class="card-header">
                                                                   <h5>ข้อมูลเอกสาร</h5>
                                                                   <hr/>
                                                              </div>
                                                              <form id="get_product_form">
                                                                   <div class="card-body table-border-style">
                                                                        <div class="table-responsive">
                                                                             <table id="table2" class="table table-striped">
                                                                                  <thead>
                                                                                       <tr>
                                                                                            <th>เลขที่เอกสาร</th>
                                                                                            <th>วันที่จอง</th>
                                                                                            <th>จำนวนวัน</th>
                                                                                            <th>สถานที่จัดส่ง</th>
                                                                                            <th>ราคา/หน่วย</th>
                                                                                            <th>จำนวนสินค้าสั่งจอง</th>
                                                                                            <th>จำนวนสินค้าต้องการส่ง</th>
                                                                                       </tr>
                                                                                  </thead>
                                                                                  <tbody>
                                                                                  </tbody>
                                                                             </table>
                                                                        </div>
                                                                   </div>
                                                                   <div class="card-body">
                                                                        <div class="card_shared_product">
                                                                             <div class="card-header">
                                                                                  <h5>แบ่งสินค้ามาจาก</h5>
                                                                                  <hr/>
                                                                                  <div class="form-row">
                                                                                       <div class="form-group d-inline mr-2">
                                                                                            <input type="radio" name="share_product_radio" id="share_product_radio_1" class="share_product_radio" value="Y">
                                                                                            <label for="share_product_radio_1">สินค้าตนเอง</label>
                                                                                       </div>
                                                                                       <div class="form-group d-inline">
                                                                                            <input type="radio" name="share_product_radio" id="share_product_radio_2" class="share_product_radio" value="N">
                                                                                            <label for="share_product_radio_2">สินค้าของพนักงานขายคนอื่น</label>
                                                                                       </div>
                                                                                  </div>
                                                                             </div>
                                                                             <div class="form-row form-1 needs-validation" novalidate>
                                                                                  {{-- <div class="col-md-12 mb-3">
                                                                                       <label for="sale_code">รหัสพนักงานขาย</label>
                                                                                       <input type="text" class="form-control" name="sale_code" id="sale_code" placeholder="" value="" required readonly>
                                                                                  </div> --}}
                                                                                  <div class="col-md-12 mb-3">
                                                                                       <input type="hidden" name="sale_code" id="sale_code" value="">
                                                                                       <input type="hidden" name="customer_id"  value="{{$customer_id}}" >
                                                                                       {{-- <button type="button" class="btn btn-info" id="btn-get-product"><i class="fa fa-search mr-2"></i>ค้นหา</button> --}}
                                                                                  </div>
                                                                             </div>
                                                                        </div>
                                                                   </div>
                                                              </form>
                                                              <div class="card-body table-border-style">
                                                                   <div class="table-responsive">
                                                                        <table id="table3" class="table table-striped">
                                                                             <thead>
                                                                                  <tr>
                                                                                       <th>#</th>
                                                                                       <th>เลขที่เอกสาร</th>
                                                                                       <th>วันที่จอง</th>
                                                                                       <th>ชื่อลูกค้า</th>
                                                                                       <th>เลขตู้จัดสินค้า</th>
                                                                                       <th>สถานะตู้</th>
                                                                                       <th>จำนวนสินค้าสั่งจอง</th>
                                                                                       <th>จำนวนสินค้าแบ่งให้</th>
                                                                                  </tr>
                                                                             </thead>
                                                                             <tbody>
                                                                             </tbody>
                                                                             <tfoot>
                                                                                  <tr>
                                                                                       <td colspan="7" class="text-right">รวมจำนวนสินค้า</td>
                                                                                       <td><span id="sum_amount_product">0</span></td>
                                                                                  </tr>
                                                                             </tfoot>
                                                                        </table>
                                                                   </div>
                                                              </div>
                                                         </div>
                                                    </div>
                                               </div>
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

        <!-- notification Js -->
        <script src="{{asset('assets/js/plugins/bootstrap-notify.min.js')}}"></script>

    <script>
     var url_gb = '{{ url('') }}'
     var emp_code = '{{$result->EmpCode}}';
     $('body').on('keydown','.number-only',function (e) {
          // Allow: backspace, delete, tab, escape, enter and .
          if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
          // Allow: Ctrl+A, Command+A
          (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
          // Allow: home, end, left, right, down, up
          (e.keyCode >= 35 && e.keyCode <= 40)) {
               // let it happen, don't do anything
               return;
          }
          // Ensure that it is a number and stop the keypress
          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
               e.preventDefault();
          }
     });

     function jsDateDiff1(strDate1,strDate2){
          var theDate1 = Date.parse(strDate1)/1000;
          var theDate2 = Date.parse(strDate2)/1000;
          var diff=(theDate2-theDate1)/(60*60*24);
          return diff;
     }

     function formatDate(date) {
          var d = new Date(date),
          month = '' + (d.getMonth() + 1),
          day = '' + d.getDate(),
          year = d.getFullYear();

          if (month == 1){
               month = 'Jan';
          } else if (month == 2) {
               month = 'Feb';
          } else if (month == 3) {
               month = 'Mar';
          } else if (month == 4) {
               month = 'Apr';
          } else if (month == 5) {
               month = 'May';
          } else if (month == 6) {
               month = 'Jun';
          } else if (month == 7) {
               month = 'Jul';
          } else if (month == 8) {
               month = 'Aug';
          } else if (month == 9) {
               month = 'Sep';
          } else if (month == 10) {
               month = 'Oct';
          } else if (month == 11) {
               month = 'Nov';
          } else if (month == 12) {
               month = 'Dec';
          }
          // if (month.length < 2)
          // month = '0' + month;
          if (day.length < 2)
          day = '0' + day;

          return [day, month, year].join('-');
     }

     function notify(from, align, icon, type, animIn, animOut, title) {
          $.notify({
               icon: icon,
               title:  title,
               message: '',
               url: ''
          }, {
               element: 'body',
               type: type,
               allow_dismiss: true,
               placement: {
                    from: from,
                    align: align
               },
               offset: {
                    x: 30,
                    y: 30
               },
               spacing: 10,
               z_index: 999999,
               delay: 2500,
               timer: 1000,
               url_target: '_blank',
               mouse_over: false,
               animate: {
                    enter: animIn,
                    exit: animOut
               },
               icon_type: 'class',
               template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
               '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
               '<span data-notify="icon"></span> ' +
               '<span data-notify="title">{1}</span> ' +
               '<span data-notify="message">{2}</span>' +
               '<div class="progress" data-notify="progressbar">' +
               '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
               '</div>' +
               '<a href="{3}" target="{4}" data-notify="url"></a>' +
               '</div>'
          });
     };

     function numIndex() {
          let allSum = 0;
          amount_tranqty = $("#product_amount_tranqty").text();
          $.each($('#table3').find('.product_share'), function (index, el) {
               if ($(this).val() != ''){
                    let sum_list = parseInt($(this).val());
                    allSum += sum_list;
                    if (allSum > parseInt(amount_tranqty)){
                         notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "รวมจำนวนสินค้าต้องไม่มากกว่าจำนวนสินค้าสั่งจอง");
                         $(this).val("");
                         $(this).focus();
                         return false;
                    }
               }
          });
          $("#sum_amount_product").text(allSum);
          $("#product_amount_sent").text(allSum);

     }

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
                         $("#table1 tbody").empty();
                         if(rec.status==1){
                              let tr = '';
                              if (rec.datas.length > 0){
                                   $.each(rec.datas, function( key, data ) {
                                        tr += '<tr>';
                                        tr += '<td>';
                                        tr += '<input type="radio" class="form-check ref_soco_id" value="'+data.RefSOCOID+'">';
                                        // tr += '<input type="hidden" name="ref_list_no" id="ref_list_no_'+data.RefSOCOID+'" value="'+data.RefListNo+'">';
                                        // tr += '<input type="hidden" name="ref_soco_no" id="ref_soco_no_'+data.RefSOCOID+'" value="'+data.RefSOCONo+'">';
                                        tr += '<input type="hidden" id="ship_date_'+data.RefSOCOID+'" value="'+data.ShipDate+'">';
                                        tr += '<input type="hidden" id="EmpCode'+data.RefSOCOID+'" value="'+data.EmpCode+'">';
                                        tr += '</td>';
                                        tr += '<td><span id="span_ref_soco_no_'+data.RefSOCOID+'">'+data.RefSOCONo+'</span></td>';
                                        tr += '<td><span id="span_docudate_'+data.RefSOCOID+'">'+ formatDate(data.DocuDate) +'</span></td>';
                                        tr += '<td><span id="span_date_amount_'+data.RefSOCOID+'">'+jsDateDiff1(data.DocuDate, data.ShipDate)+'</span></td>';
                                        tr += '<td><span id="span_cus_address_'+data.RefSOCOID+'">'+data.CustAddress+'</span></td>';
                                        tr += '<td><span id="span_goodprice_'+data.RefSOCOID+'">'+data.GoodPrice2+'</span></td>';
                                        tr += '<td><span id="span_tranqty_'+data.RefSOCOID+'">'+data.TranQty+'</span></td>';
                                        tr += '<td>0</td>';
                                        tr += '</tr>';
                                   });
                              } else {
                                   tr += '<tr><td colspan="8" align="center">ไม่พบข้อมูล</td></tr>';
                              }
                              $("#table1 tbody").append(tr);
                         } else {
                              swal("", rec.content, "warning");
                         }
                    }).fail(function(){
                         $("#preloaders").css("display", "none");
                         swal("", rec.content, "error");
                    });
               }
               else if(data == 2) {
                    $("#share_product_radio_1").prop("checked", true);
                    $("#share_product_radio_2").prop("checked", false);
                    $("#table2 tbody").empty();
                    $("#table3 tbody").empty();
                    var valids = new Array();
                    var doc_ids = new Array();
                    $('.ref_soco_id').each(function(i, obj) {
                         valids.push($(obj).prop("checked"));
                         doc_ids.push($(obj).val());
                    });
                    if (jQuery.inArray( true, valids ) != -1) {
                         for (var i = 0; i < valids.length; i++) {
                              if(valids[i] == true){
                                   let tr = '';
                                   // a = $(".tr_"+doc_ids[i]).clone();
                                   let ref_soco_no = $("#span_ref_soco_no_"+doc_ids[i]).text();
                                   let docudate = $("#span_docudate_"+doc_ids[i]).text();
                                   let date_amount = $("#span_date_amount_"+doc_ids[i]).text();
                                   let cus_address = $("#span_cus_address_"+doc_ids[i]).text();
                                   let goodprice = $("#span_goodprice_"+doc_ids[i]).text();
                                   let tranqty = $("#span_tranqty_"+doc_ids[i]).text();
                                   let shipdate = $("#ship_date_"+doc_ids[i]).val();
                                   let goodcode = $("#GoodCode").val();
                                   let EmpCode = $("#EmpCode"+doc_ids[i]).val();
                                   tr += '<tr>';
                                   tr += '<td>'+ref_soco_no+'';
                                   tr += '<input type="hidden" name="goodcode" value="'+goodcode+'">';
                                   tr += '<input type="hidden" name="shipdate" value="'+shipdate+'">';
                                   tr += '<input type="hidden" name="EmpCode" value="'+EmpCode+'">';
                                   tr += '</td>';
                                   tr += '<td>'+docudate+'</td>';
                                   tr += '<td>'+date_amount+'</td>';
                                   tr += '<td>'+cus_address+'</td>';
                                   tr += '<td>'+goodprice+'</td>';
                                   tr += '<td><span id="product_amount_tranqty">'+tranqty+'</span></td>';
                                   tr += '<td><span id="product_amount_sent">0</span></td>';
                                   tr += '</tr>';
                                   $("#table2 tbody").append(tr);

                                   $.ajax({
                                        method : "post",
                                        url : '{{ route('customer.get_default_product')}}',
                                        dataType : 'json',
                                        data : $("#get_product_form").serialize(),
                                        headers: {
                                             'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                        },
                                        beforeSend: function() {
                                             $("#preloaders").css("display", "block");
                                        },
                                   }).done(function(rec){
                                        $("#preloaders").css("display", "none");
                                        $("#table3 tbody").empty();
                                        if(rec.status==1){
                                             let tr = '';
                                             let chkbox = '';
                                             if (rec.datas.length > 0){
                                                  $.each(rec.datas, function( key, data ) {
                                                       if (data.Flag_st.length == 0){
                                                            chkbox = '<input type="checkbox" name="product_share_chk[]" class="form-check-input product_share_chk" data-value="'+data.RefSOCOID+'" value="'+data.RefSOCOID+'">';
                                                       }
                                                       tr += '<tr>';
                                                       tr += '<td>';
                                                       tr += chkbox;
                                                       tr += '</td>';
                                                       tr += '<td>'+data.RefSOCONo+'</td>';
                                                       tr += '<td>'+ formatDate(data.DocuDate) +'</td>';
                                                       tr += '<td>'+data.EmpName+'</td>';
                                                       tr += '<td>'+data.ContainerNO+'</td>';
                                                       tr += '<td>'+data.Flag_st+'</td>';
                                                       tr += '<td>'+data.TranQty+'</td>';
                                                       tr += '<td><input type="text" class="form-control product_share" name="product_share['+data.RefSOCOID+']" id="product_share_'+data.RefSOCOID+'" readonly="readonly" /></td>';
                                                       tr += '</tr>';
                                                  });
                                             } else {
                                                  tr += '<tr><td colspan="8" align="center">ไม่พบข้อมูล</td></tr>';
                                             }
                                             $("#table3 tbody").append(tr);

                                             $('.product_share_chk').on('click', function() {
                                                  var data = $(this).data("value");
                                                  if ($(this).is(':checked')) {
                                                       $("#product_share_" + data).attr("readonly", false);
                                                  } else {
                                                       $("#product_share_" + data).attr("readonly", true);
                                                  }
                                             });
                                        } else {
                                             swal("", rec.content, "warning");
                                        }
                                   }).fail(function(){
                                        $("#preloaders").css("display", "none");
                                        swal("", rec.content, "error");
                                   });
                              }
                         }
                    } else {
                         notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "กรุณาเลือกอย่างน้อย 1 รายการ");
                         return false;
                    }
               }
               else if (data == 3) {
                    // if (!$('#share_product_radio').val()) {
                    //      notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "กรุณาระบุรหัสพนักงานขาย");
                    //      $('#share_product_radio').focus();
                    //      $('.form-1').addClass('was-validated');
                    //      return false;
                    // }
                    var valids = new Array();
                    $('.product_share_chk').each(function(i, obj) {
                         valids.push($(obj).prop("checked"));
                    });
                    if (jQuery.inArray(true, valids) != -1) {
                         
                    } else {
                         notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "กรุณาเลือกอย่างน้อย 1 รายการ");
                         return false;
                    }
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
               if (data == 3){
                    $(".ref_soco_id").prop("checked", false);
               }
               $("#menu" + data).removeClass('active');
               $("#menu" + data).removeClass('in');
               $("#menu" + prev).addClass('active');
               $("#menu" + prev).addClass('in');

               $("#icon-"+data).removeClass('btn-info').addClass('btn-default');
               $("#icon-"+prev).addClass('btn-info').removeClass('btn-default');
          });

          $('input[name=share_product_radio]').on('change', function() {
               $.ajax({
                    method : "post",
                    url : '{{ route('customer.get_product')}}',
                    dataType : 'json',
                    data : $("#get_product_form").serialize(),
                    headers: {
                         'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    beforeSend: function() {
                         $("#preloaders").css("display", "block");
                    },
               }).done(function(rec){
                    $("#preloaders").css("display", "none");
                    $("#table3 tbody").empty();
                    if(rec.status==1){
                         let tr = '';
                         if (rec.datas.length > 0){
                              $.each(rec.datas, function( key, data ) {
                                   console.log(data.Flag_st.length);
                                   if (data.Flag_st.length == 0){
                                        chkbox = '<input type="checkbox" name="product_share_chk[]" class="form-check-input product_share_chk" data-value="'+data.RefSOCOID+'" value="'+data.RefSOCOID+'">';
                                   } else {
                                        chkbox = '';
                                   }
                                   tr += '<tr>';
                                   tr += '<td>';
                                   tr += chkbox;
                                   tr += '</td>';
                                   tr += '<td>'+data.RefSOCONo+'</td>';
                                   tr += '<td>'+ formatDate(data.DocuDate) +'</td>';
                                   tr += '<td>'+data.EmpName+'</td>';
                                   tr += '<td>'+data.ContainerNO+'</td>';
                                   tr += '<td>'+data.Flag_st+'</td>';
                                   tr += '<td><span id="tran_qty_'+data.RefSOCOID+'">'+data.TranQty+'</span></td>';
                                   tr += '<td><input type="text" class="form-control product_share number-only" data-value="'+data.RefSOCOID+'" name="product_share['+data.RefSOCOID+']" id="product_share_'+data.RefSOCOID+'" readonly="readonly" /></td>';
                                   tr += '</tr>';
                              });
                         } else {
                              tr += '<tr><td colspan="8" align="center">ไม่พบข้อมูล</td></tr>';
                         }
                         $("#table3 tbody").append(tr);

                         $('.product_share_chk').on('click', function() {
                              var data = $(this).data("value");
                              if ($(this).is(':checked')) {
                                   $("#product_share_" + data).attr("readonly", false);
                              } else {
                                   $("#product_share_" + data).attr("readonly", true);
                                   $("#product_share_" + data).val("");
                              }
                         });

                         $('.product_share').on('keyup', function() {
                              var data = $(this).val();
                              var data_value = $(this).data("value");
                              var tran_qty = $("#tran_qty_"+data_value).text();
                              if (parseInt(data) > parseInt(tran_qty)) {
                                   notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "ห้ามกรอกเกินจำนวนสินค้าสั่งจอง");
                                   $(this).val("");
                                   $(this).focus();
                              }
                              numIndex();
                         });
                    } else {
                         swal("", rec.content, "warning");
                    }
               }).fail(function(){
                    $("#preloaders").css("display", "none");
                    swal("", rec.content, "error");
               });
          });



          // $("#btn-get-product").on('click', function (e){
          //      e.preventDefault();
          //      // if ($("#sale_code").val() == ''){
          //      //      notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "กรุณาระบุรหัสพนักงานขาย");
          //      //      $("#sale_code").focus();
          //      //      return false;
          //      // } else {
          //      //
          //      // }
          //      if ($(".share_product_radio").is(':checked') == false) {
          //           notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "กรุณาเลือกว่าแบ่งสินค้ามาจากใคร");
          //           $("#sale_code").focus();
          //           return false;
          //      } else {
          //           $.ajax({
          //                method : "post",
          //                url : '{{ route('customer.get_product')}}',
          //                dataType : 'json',
          //                data : $("#get_product_form").serialize(),
          //                headers: {
          //                     'X-CSRF-TOKEN': "{{ csrf_token() }}"
          //                },
          //                beforeSend: function() {
          //                     $("#preloaders").css("display", "block");
          //                },
          //           }).done(function(rec){
          //                $("#preloaders").css("display", "none");
          //                $("#table3 tbody").empty();
          //                if(rec.status==1){
          //                     let tr = '';
          //                     if (rec.datas.length > 0){
          //                          $.each(rec.datas, function( key, data ) {
          //                               tr += '<tr>';
          //                               tr += '<td>';
          //                               tr += '<input type="checkbox" name="product_share_chk[]" class="form-check-input product_share_chk" data-value="'+data.RefSOCOID+'" value="'+data.RefSOCOID+'">';
          //                               tr += '</td>';
          //                               tr += '<td>'+data.RefSOCONo+'</td>';
          //                               tr += '<td>'+ formatDate(data.DocuDate) +'</td>';
          //                               tr += '<td>'+data.EmpName+'</td>';
          //                               tr += '<td>'+data.ContainerNO+'</td>';
          //                               tr += '<td>'+data.Flag_st+'</td>';
          //                               tr += '<td>'+data.TranQty+'</td>';
          //                               tr += '<td><input type="text" class="form-control" name="product_share[]" id="product_share_'+data.RefSOCOID+'" readonly="readonly" /></td>';
          //                               tr += '</tr>';
          //                          });
          //                     } else {
          //                          tr += '<tr><td colspan="8" align="center">ไม่พบข้อมูล</td></tr>';
          //                     }
          //                     $("#table3 tbody").append(tr);
          //
          //                     $('.product_share_chk').on('click', function() {
          //                          var data = $(this).data("value");
          //                          if ($(this).is(':checked')) {
          //                               $("#product_share_" + data).attr("readonly", false);
          //                          } else {
          //                               $("#product_share_" + data).attr("readonly", true);
          //                          }
          //                     });
          //                } else {
          //                     swal("", rec.content, "warning");
          //                }
          //           }).fail(function(){
          //                $("#preloaders").css("display", "none");
          //                swal("", rec.content, "error");
          //           });
          //      }
          // });
     });
    </script>
</body>

</html>
