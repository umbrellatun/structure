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
                                                          <button type="button" class="btn btn-default btn-circle" id="icon-3" data-toggle="tab" disabled><i class="fa fa-image fa-3x"></i></button>
                                                          <p><small>Upload<br />images</small></p>
                                                     </div>
                                                     <div class="process-step">
                                                          <button type="button" class="btn btn-default btn-circle" id="icon-4" data-toggle="tab" disabled><i class="fa fa-cogs fa-3x"></i></button>
                                                          <p><small>Configure<br />display</small></p>
                                                     </div>
                                                     <div class="process-step">
                                                          <button type="button" class="btn btn-default btn-circle" id="icon-5" data-toggle="tab" disabled><i class="fa fa-check fa-3x"></i></button>
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
                                                              <div class="card-body table-border-style">
                                                                   <div class="table-responsive">
                                                                        <table id="table2" class="table table-striped">
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
                                                              <div class="card-body">
                                                                   <div class="card-header">
                                                                        <h5>แบ่งสินค้ามาจาก</h5>
                                                                        <hr/>
                                                                        <div class="form-row">
                                                                             <div class="form-group d-inline mr-2">
                                                                                  <input type="radio" name="share_product_radio" id="share_product_radio_1" value="Y">
                                                                                  <label for="share_product_radio_1">สินค้าตนเอง</label>
                                                                             </div>
                                                                             <div class="form-group d-inline">
                                                                                  <input type="radio" name="share_product_radio" id="share_product_radio_2" value="N">
                                                                                  <label for="share_product_radio_2">สินค้าของพนักงานขายคนอื่น</label>
                                                                             </div>
                                                                        </div>
                                                                   </div>
                                                                   <div class="form-row">
                                                                        <div class="col-md-12 mb-3">
                                                                             <label for="sale_code">รหัสพนักงานขาย</label>
                                                                             <input type="text" class="form-control" name="sale_code" id="sale_code" placeholder="" value="" required="true" readonly="readonly">
                                                                        </div>
                                                                   </div>
                                                                   <div class="card-body table-border-style">
                                                                        <div class="table-responsive">
                                                                             <table class="table table-striped">
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
                                                                                       @for ($i=0; $i < 5; $i++)
                                                                                            <tr>
                                                                                                 <td><input type="checkbox" class="form-check" value=""></td>
                                                                                                 <td>SO-CO2104-0001</td>
                                                                                                 <td>01/04/2021</td>
                                                                                                 <td>Sataporn Chunwet</td>
                                                                                                 <td>21040101001</td>
                                                                                                 <td>เปิด</td>
                                                                                                 <td>100</td>
                                                                                                 <td>20</td>
                                                                                            </tr>
                                                                                       @endfor
                                                                                  </tbody>
                                                                                  <tfoot>
                                                                                       <tr>
                                                                                            <td colspan="7" class="text-right">รวมจำนวนสินค้า</td>
                                                                                            <td >20</td>
                                                                                       </tr>
                                                                                  </tfoot>
                                                                             </table>
                                                                        </div>
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
     function jsDateDiff1(strDate1,strDate2){
		var theDate1 = Date.parse(strDate1)/1000;
		var theDate2 = Date.parse(strDate2)/1000;
		var diff=(theDate2-theDate1)/(60*60*24);
		return diff;
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
                                           tr += '<tr id="tr_'+data.RefSOCOID+'">';
                                           tr += '<td>';
                                           tr += '<input type="radio" name="ref_soco_id" class="form-check ref_soco_id" value="'+data.RefSOCOID+'">';
                                           tr += '<input type="hidden" name="ref_list_no" value="'+data.RefListNo+'">';
                                           tr += '</td>';
                                           tr += '<td>'+data.RefSOCONo+'</td>';
                                           tr += '<td>'+data.DocuDate+'</td>';
                                           tr += '<td>'+jsDateDiff1(data.DocuDate, data.ShipDate)+'</td>';
                                           tr += '<td>'+data.CustAddress+'</td>';
                                           tr += '<td>'+data.GoodPrice2+'</td>';
                                           tr += '<td>'+data.TranQty+'</td>';
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
                       $("#table2 tbody").empty();
                       var valids = new Array();
                       var doc_ids = new Array();
                       $('.ref_soco_id').each(function(i, obj) {
                            valids.push($(obj).prop("checked"));
                            doc_ids.push($(obj).val());
                       });
                       if (jQuery.inArray( true, valids ) != -1) {
                              for (var i = 0; i < valids.length; i++) {
                                   if(valids[i] == true){
                                        a = $("#tr_"+doc_ids[i]).clone();
                                        $("#table2 tbody").append(a);
                                   }
                              }
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
                  if($(this).val() == 'Y'){
                       $("#sale_code").val(emp_code);
                       $("#sale_code").attr("readonly", true);
                  } else {
                       $("#sale_code").val("");
                       $("#sale_code").attr("placeholder", "กรุณาระบุรหัสพนักงานขาย");
                       $("#sale_code").attr("readonly", false);
                  }
             });
             // $('input[name=share_product_radio]').on('click', function (e){
             //      e.preventDefault();
             //      var data = $(this).val();
             //      console.log(data);
             //      if (data == 'Y'){
             //           $("#sale_code").val(emp_code);
             //      } else {
             //           $("#sale_code").attr("readonly", false);
             //      }
             // });

        });
    </script>


</body>

</html>
