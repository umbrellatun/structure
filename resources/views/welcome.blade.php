<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$title}}</title>
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
    {{-- <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"> --}}
    <link rel="icon" href="{{asset('assets/images/JT-01.ico')}}" type="image/x-icon">
    <!-- select2 css -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/select2.min.css')}}">
    <!-- prism css -->
    {{-- <link rel="stylesheet" href="{{asset('assets/css/plugins/prism-coy.css')}}"> --}}
    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> --}}
    <link rel="stylesheet" href="{{asset('assets/css/plugins/daterangepicker.css')}}">


    {{-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" id="bootstrap-css">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
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
         background: url({{asset('assets/images/Pulse-1s-200px.gif')}}) 50% 50% no-repeat rgb(249,249,249);
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
                {{-- <img src="{{asset('assets/images/logo.png')}}" alt="" class="logo">
                <img src="{{asset('assets/images/logo-icon.png')}}" alt="" class="logo-thumb"> --}}

                <img src="{{asset('assets/images/LOGOJT.png')}}" alt="" class="logo" style="height: 65px; margin-top: 7px;">
                <img src="{{asset('assets/images/JT_64X45.png')}}" alt="" class="logo-thumb">
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
                                    <div class="row text-right">
                                         <div class="col-md-12">
                                              <button type="button" class="btn btn-primary btn-sm btn-history" data-toggle="modal" data-target="#HistoryModal"><i class="fas fa-history"></i> History</button>
                                         </div>
                                    </div>
                               </div>
                               <div class="card-body" id="main_content">
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
                                                                        <div class="col-md-2 mb-3">
                                                                             <label for="DocuNO">เลขที่เอกสาร</label>
                                                                             <input type="text" class="form-control" name="DocuNO" id="DocuNO" value="{{$result->DocuNO}}" required readonly>
                                                                        </div>
                                                                        <div class="col-md-3 mb-3">
                                                                             <label for="DocuDate">วันที่เอกสาร</label>
                                                                             <input type="text" class="form-control" name="DocuDate" id="DocuDate" value="{{ date_format(date_create($result->DocuDate), "d M Y H:i:s") }}" required readonly>
                                                                        </div>
                                                                        <div class="col-md-2 mb-3">
                                                                             <label for="send_appointment">วันที่นัดส่ง</label>
                                                                             <input type="text" class="form-control" name="send_appointment" id="send_appointment" value="" required />
                                                                        </div>
                                                                        <div class="col-md-2 mb-3">
                                                                             <label for="CustCode">รหัสลูกค้า</label>
                                                                             <input type="text" name="CustCode" id="CustCode" value="{{$result->CustCode}}" class="form-control" required readonly />
                                                                             <input type="hidden" name="CustName" id="CustName" value="{{$result->CustName}}" />
                                                                        </div>
                                                                        <div class="col-md-3 mb-3">
                                                                             <label for="CustCode">ชื่อลูกค้า</label>
                                                                             <input type="text" class="form-control" value="{{$result->CustName}}" readonly/>
                                                                        </div>
                                                                   </div>
                                                                   <div class="form-row form-1 needs-validation" novalidate>
                                                                        <div class="col-md-2 mb-3">
                                                                             <label for="EmpCode">รหัสพนักงานขาย</label>
                                                                             <input type="text" name="EmpCode" id="EmpCode" value="{{$result->EmpCode}}" class="form-control" required readonly>
                                                                             <input type="hidden" name="empname" id="empname" value="{{$result->empname}}" class="form-control" required>
                                                                        </div>
                                                                        <div class="col-md-3 mb-3">
                                                                             <label for="EmpCode">ชื่อพนักงานขาย</label>
                                                                             <input type="text"  value="{{$result->empname}}" class="form-control" required readonly>
                                                                        </div>
                                                                        <div class="col-md-7 mb-3">
                                                                             <label for="GoodCode">รหัสสินค้า</label>
                                                                             <select class="form-control js-example-data-array" name="GoodCode" id="GoodCode" required>
                                                                                  <option value></option>
                                                                                  @foreach ($products as $key => $product)
                                                                                       <option value="{{$product->GoodCode}}">{{$product->GoodCode}}:{{$product->GoodName1}}</option>
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
                                                                   <h5>ข้อมูลเอกสาร {{$result->CustName}}</h5>
                                                                   <br/><span class="span_product_name"></span>
                                                                   <hr/>
                                                              </div>
                                                              <div class="card-body table-border-style">
                                                                   <div class="table-responsive">
                                                                        <table id="table1" class="table table-striped">
                                                                             <thead>
                                                                                  <tr>
                                                                                       <th class="text-center">#</th>
                                                                                       <th class="text-center">เลขที่เอกสาร</th>
                                                                                       <th class="text-center">วันที่จอง</th>
                                                                                       <th class="text-right">จำนวนวัน</th>
                                                                                       <th class="text-left">สถานที่จัดส่ง</th>
                                                                                       <th class="text-right">ราคา/หน่วย</th>
                                                                                       <th class="text-right">จำนวนสั่งจอง</th>
                                                                                       <th class="text-right">จำนวนต้องการส่ง</th>
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
                                                                   <h5>ข้อมูลเอกสาร {{$result->CustName}}</h5>
                                                                   <br/><span class="span_product_name"></span>
                                                                   <hr/>
                                                              </div>
                                                              <form id="get_product_form">
                                                                   <div class="card-body table-border-style">
                                                                        <div class="table-responsive">
                                                                             <table id="table2" class="table table-striped">
                                                                                  <thead>
                                                                                       <tr>
                                                                                            <th class="text-center">เลขที่เอกสาร</th>
                                                                                            <th class="text-center">วันที่จอง</th>
                                                                                            <th class="text-center">วันที่นัดส่ง</th>
                                                                                            <th class="text-center">จำนวนวัน</th>
                                                                                            <th class="text-left">สถานที่จัดส่ง</th>
                                                                                            <th class="text-right">ราคา/หน่วย</th>
                                                                                            <th class="text-right">จำนวนสั่งจอง</th>
                                                                                            <th class="text-right">จำนวนต้องการส่ง</th>
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
                                                                                       <th>วันที่นัดส่ง</th>
                                                                                       <th>ชื่อลูกค้า</th>
                                                                                       <th>ชื่อพนักงานขาย</th>
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
                                                                                       <td class="text-right"><span id="sum_amount_product">0</span></td>
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
                                                <form id="FormAdd">
                                                     <div class="row">
                                                         <div class="col-md-12">
                                                              <div class="card">
                                                                   <div class="card-header">
                                                                        <h5>สรุปข้อมูล</h5>
                                                                        <br/><span class="span_product_name"></span>
                                                                        <hr/>
                                                                   </div>
                                                                   <div class="card-body">
                                                                        <h5>แบ่งสินค้ามาจาก</h5>
                                                                        <hr/>
                                                                        <div class="card-body table-border-style">
                                                                             <div class="table-responsive">
                                                                                  <table id="table4" class="table table-striped">
                                                                                       <thead>
                                                                                            <tr>
                                                                                                 <th class="text-center">เลขที่เอกสาร</th>
                                                                                                 <th class="text-center">วันที่นัดส่ง</th>
                                                                                                 <th class="text-left">ชื่อลูกค้า</th>
                                                                                                 <th class="text-center">เลขตู้จัดสินค้า</th>
                                                                                                 <th class="text-center">สถานะตู้</th>
                                                                                                 <th class="text-right">จำนวนสั่งจอง</th>
                                                                                                 <th class="text-right">จำนวนแบ่งให้</th>
                                                                                            </tr>
                                                                                       </thead>
                                                                                       <tbody>
                                                                                       </tbody>
                                                                                       <tfoot>
                                                                                       </tfoot>
                                                                                  </table>
                                                                             </div>
                                                                        </div>
                                                                        <div class="row">
                                                                             <div class="col-12 text-center mb-5">
                                                                                  <img src="{{ asset('assets/images/product/packing.png') }}" style="width: 100px; height: 100px;">
                                                                             </div>
                                                                        </div>
                                                                        <h5>ผู้รับ: {{$result->CustName}}</h5>
                                                                        <hr/>
                                                                        <div class="card-body table-border-style">
                                                                             <div class="table-responsive">
                                                                                  <table id="table5" class="table table-striped">
                                                                                       <thead>
                                                                                            <tr>
                                                                                                 <th class="text-center">เลขที่เอกสาร</th>
                                                                                                 <th class="text-center">วันที่จอง</th>
                                                                                                 <th class="text-center">จำนวนวัน</th>
                                                                                                 <th class="text-left">สถานที่จัดส่ง</th>
                                                                                                 <th class="text-right">ราคา/หน่วย</th>
                                                                                                 <th class="text-right">จำนวนสั่งจอง</th>
                                                                                                 <th class="text-right">จำนวนต้องการส่ง</th>
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
                                                    </div>
                                                     <ul class="list-unstyled list-inline pull-right">
                                                          <li><button type="button" class="btn btn-default prev-step" data-id="4" id="prev-step-4"><i class="fa fa-chevron-left"></i> Back</button></li>
                                                          <li><button type="submit" id="btn-submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button></li>
                                                     </ul>
                                                </form>
                                           </div>
                                           <div id="menu5" class="tab-pane fade text-center">
                                                <h3 class="text-success">จัดเก็บข้อมูลสำเร็จ</h3>
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <img src="{{ asset('assets/images/success-icon.png') }}" style="width: 100px; height: 100px;">
                                                    </div>
                                               </div>
                                               <div class="row">
                                                   <div class="col-md-12">
                                                        <a href="{{ route('customer', ['customer_id' => $customer_id])}}" class="btn notifications btn-info" data-type="info" data-from="top" data-align="right" data-notify-icon="feather icon-shopping-cart">กลับหน้าแรก</a>
                                                   </div>
                                              </div>
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

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg in" id="HistoryModal" tabindex="-1" role="dialog" aria-labelledby="HistoryModal" aria-hidden="true">
         <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  {{-- style="width: 1200px; margin-left: -180px; height: 560px;" --}}
                   <div class="modal-header">
                        <h5 class="modal-title h4">คำขอแบ่งสินค้า</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   </div>
                   <div class="modal-body">
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                 <table id="tableHD" class="table table-striped">
                                      <thead>
                                           <tr>
                                                <th>NO</th>
                                                <th>เลขที่เอกสาร</th>
                                                <th>เลขที่ใบจอง</th>
                                                <th>วันที่เอกสาร</th>
                                                <th>วันที่นัดส่ง</th>
                                                <th>วันที่ทำการแลก</th>
                                                <th>ชื่อลูกค้า</th>
                                                {{-- <th>ชื่อพนักงานขาย</th> --}}
                                                <th>ชื่อสินค้า</th>
                                                <th>อนุมัติคำขอ</th>
                                                <th>ยืนยัน<br/>แบ่งสินค้า</th>
                                                <th>Action</th>
                                           </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                      <tfoot>
                                      </tfoot>
                                 </table>
                            </div>
                       </div>
                   </div>
              </div>
         </div>
   </div>

   <div class="modal fade bd-example-modal-lg in" id="ModalView" tabindex="-1" role="dialog" aria-labelledby="ModalView" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                  <div class="modal-header">
                       <h5 class="modal-title h4">แบ่งจาก</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                       <div class="card-body table-border-style">
                          <div class="table-responsive">
                               <table id="tableDT" class="table table-striped">
                                     <thead>
                                          <tr>
                                               <th>NO</th>
                                               <th>เลขที่เอกสาร</th>
                                               <th>เลขที่ใบจอง</th>
                                               <th>วันที่จอง</th>
                                               <th>ชื่อลูกค้า</th>
                                               <th>เลขตู้จัดสินค้า</th>
                                               <th>จำนวนสินค้า<br/>แบ่งให้</th>
                                          </tr>
                                     </thead>
                                     <tbody>
                                     </tbody>
                                     <tfoot>
                                     </tfoot>
                               </table>
                          </div>
                     </div>
                  </div>
            </div>
        </div>
   </div>

   <div class="modal fade bd-example-modal-lg in" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="warningModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
             <div class="modal-content">
                  {{-- style="width: 1200px; margin-left: -180px; height: 560px;" --}}
                  <div class="modal-header bg-danger">
                       <h5 class="modal-title h4 text-light"><i class="fa fa-exclamation-triangle mr-2" aria-hidden="true"></i>ข้อความแจ้งเตือนการใช้งาน</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                       <div class="card-body table-border-style">
                            <div class="text-center" style="margin-bottom: 70px;">
                                 <img src="{{asset('assets/images/maintance/maintance.png')}}" style="width: 350px;"></img>
                            </div>
                            <div class="text-center">
                                 <h3 id="h3_maintenance" class="text-danger"></h3>
                           </div>
                       </div>
                  </div>
             </div>
        </div>
   </div>
    <!-- End Modal -->
    <div id="preloaders" class="preloader" style="display:none;"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Required Js -->
    <script src="{{asset('assets/js/vendor-all.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/pcoded.min.js')}}"></script>
    {{-- <script src="{{asset('assets/js/menu-setting.min.js')}}"></script> --}}

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
    <script>
    var url_gb = '{{ url('') }}'
    var emp_code = '{{$result->EmpCode}}';

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

    function getMonthNum(date) {
         var d = new Date(date),
         month = '' + (d.getMonth() + 1),
         day = '' + d.getDate(),
         year = d.getFullYear();

         if (month == 1){
              month = 1;
         } else if (month == 2) {
              month = 2;
         } else if (month == 3) {
              month = 3;
         } else if (month == 4) {
              month = 4;
         } else if (month == 5) {
              month = 5;
         } else if (month == 6) {
              month = 6;
         } else if (month == 7) {
              month = 7;
         } else if (month == 8) {
              month = 8;
         } else if (month == 9) {
              month = 9;
         } else if (month == 10) {
              month = 10;
         } else if (month == 11) {
              month = 11;
         } else if (month == 12) {
              month = 12;
         }

         return month;
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
         let allSum2 = 0;
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
                   } else {
                        allSum2 += sum_list;
                   }
              }
         });
         $("#sum_amount_product").text(allSum2);
         $("#product_amount_sent").text(allSum2);
    }

    function truncateString(str, num) {
         // If the length of str is less than or equal to num
         // just return str--don't truncate it.
         if (str.length <= num) {
              return str
         }
         // Return str truncated with '...' concatenated to the end of str.
         return str.slice(0, num) + '...'
    }

    function btn_view (doc_no) {
         $("#ModalView").addClass("in");
         $("#tableDT tbody").empty();
         $.ajax({
              method : "POST",
              url : '{{ route('customer.getSelfProductDetail') }}',
              dataType : 'json',
              data : { DocuNO : doc_no },
              headers: {
                   'X-CSRF-TOKEN': "{{ csrf_token() }}"
              },
         }).done(function(rec){
              if (rec.status == 1) {
                   let tr = '';
                   if (rec.dts.length > 0){
                        let no = 1;
                        $.each(rec.dts, function( key, hd ) {
                             tr += '<tr>';
                             tr += '<td class="text-center">'+no+'</td>';
                             tr += '<td class="text-center">'+hd.DocuNO+'</td>';
                             tr += '<td class="text-center">'+hd.RefSOCONo+'</td>';
                             tr += '<td class="text-center">'+(hd.RefSOCODate)+'</td>';
                             tr += '<td class="text-left">'+hd.CustName+'</td>';
                             tr += '<td class="text-center">'+hd.ContainerNO+'</td>';
                             tr += '<td class="text-center">'+hd.SplitQty+'</td>';
                             tr += '</tr>';
                             no = parseInt(no) + 1;
                        });
                   } else {
                        tr += '<tr><td colspan="8" align="center">ไม่พบข้อมูล</td></tr>';
                   }
                   $("#tableDT tbody").append(tr);

              } else {
                   notify("bottom", "left", "fas fa-times-circle", "danger", "", "", "ไม่สำเร็จ");
              }
         }).fail(function(){

         });
    }

    function ConvertDateToEng(data){
          var date = '';
          if (data) {
               var month;
               var x = data.split("-");
               var position_3 = x[0];
               var position_2 = x[1];
               var position_1 = x[2];

               var y = position_1.split(" ");
               var position1 = y[0];
               var position4 = y[1];

               switch (position_2) {
                    case '01' : month = "Jan"; break;
                    case '02' : month = "Feb"; break;
                    case '03' : month = "Mar"; break;
                    case '04' : month = "Apr"; break;
                    case '05' : month = "May"; break;
                    case '06' : month = "Jun"; break;
                    case '07' : month = "Jul"; break;
                    case '08' : month = "Aug"; break;
                    case '09' : month = "Sep"; break;
                    case '10' : month = "Oct"; break;
                    case '11' : month = "Nov"; break;
                    case '12' : month = "Dec"; break;
                    default : '';
               }
               date = position1 + ' ' + month + ' ' + position_3 + ' ' + position4;
          }
          return date;
     }

    $(document).ready(function (){
         $.ajax({
              method : "post",
              url : '{{ route('customer.maintenance')}}',
              dataType : 'json',
              data : {'current_date' : '{{ date('Ymd') }}'},
              headers: {
                   'X-CSRF-TOKEN': "{{ csrf_token() }}"
              },
              beforeSend: function() {
                   $(".preloader").css("display", "block");
              },
         }).done(function(rec){
              $(".preloader").css("display", "none");
              if (rec.status == 1){
                   $("#warningModal").modal('show');
                   $("#h3_maintenance").text(rec.content);
              }
              if (rec.status == 2){
                   $("#warningModal").modal('show');
                   $("#h3_maintenance").text(rec.content);
                   $("#main_content").empty();
              }
         }).fail(function(){
              $(".preloader").css("display", "none");
              swal("", rec.content, "error");
         });
    });

    $(document).ready(function() {
         $("#pcoded").pcodedmenu({
              themelayout: 'horizontal',
              MenuTrigger: 'hover',
              SubMenuTrigger: 'hover',
         });

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

         $('.btn-history').on('click',function(){
              $("#tableHD tbody").empty();
              $.ajax({
                   method : "POST",
                   url : '{{ route('customer.getSelfProduct') }}',
                   dataType : 'json',
                   data : { CustCode : '{{$result->CustCode}}'},
                   headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                   },
              }).done(function(rec){
                   if (rec.status == 1) {
                        // let tr = '';
                        // var badge1 = '';
                        // var badge2 = '';
                        // // console.log(rec.hds);
                        // if (rec.hds.length > 0){
                        //      let no = 1;
                        //      $.each(rec.hds, function( key, hd ) {
                        //           if (hd.AppvStatus == 'N'){
                        //                badge1 = '<span class="btn btn-warning btn-sm" title="รออนุมัติ">รออนุมัติ</span>';
                        //           }else if(hd.AppvStatus == 'Y'){
                        //                badge1 = '<span class="btn btn-success btn-sm" title="Approve"><i class="fas fa-check-circle f-18 analytic-icon"></i></span>';
                        //           }else if(hd.AppvStatus == 'C'){
                        //                badge1 = '<span class="btn btn-danger btn-sm" title="Not Approve"><i class="fas fa-window-close f-18 analytic-icon"></i></span>';
                        //           } else {
                        //                badge1 = '';
                        //           }
                        //           if (hd.AppvSplitStatus == 'N'){
                        //                badge2 = '<span class="btn btn-warning btn-sm"  title="รออนุมัติ">รออนุมัติ</span>';
                        //           }else if(hd.AppvSplitStatus == 'Y'){
                        //                badge2 = '<span class="btn btn-success btn-sm" title="Approve"><i class="fas fa-check-circle f-18 analytic-icon"></i></span>';
                        //           }else if(hd.AppvSplitStatus == 'R'){
                        //                badge2 = '<span class="btn btn-danger btn-sm" title="Reject"><i class="fas fa-window-close f-18 analytic-icon"></i></span>';
                        //           } else {
                        //                badge2 = '';
                        //           }
                        //           tr += '<tr>';
                        //           tr += '<td class="text-center">'+no+'</td>';
                        //           tr += '<td class="text-left">'+hd.DocuNO+'</td>';
                        //           tr += '<td class="text-left">'+hd.RefSOCONo+'</td>';
                        //           tr += '<td class="text-left">'+(hd.DocuDate)+'</td>';
                        //           tr += '<td class="text-left">'+(hd.ShipDate)+'</td>';
                        //           tr += '<td class="text-left"></td>';
                        //           tr += '<td class="text-left">'+hd.CustName+'</td>';
                        //           // tr += '<td class="text-left">'+hd.EmpName+'</td>';
                        //           tr += '<td class="text-left">'+hd.GoodName1+'</td>';
                        //           tr += '<td class="text-center">'+badge1+'</td>';
                        //           tr += '<td class="text-center">'+badge2+'</td>';
                        //           tr += '<td class="text-center">';
                        //           tr += '<div class="btn-group btn-group-sm">';
                        //           tr += '<button class="btn btn-primary btn-sm btn-view" data-value="'+hd.DocuNO+'" data-toggle="modal" data-target="#ModalView" title="ดูข้อมูล">';
                        //           tr += '<i class="fas fa-eye bigger-120"></i>';
                        //           tr += '</button>';
                        //           tr += '</div>';
                        //           tr += '</td>';
                        //           tr += '</tr>';
                        //           no++;
                        //      });
                        // } else {
                        //      tr += '<tr><td colspan="10" align="center">ไม่พบข้อมูล</td></tr>';
                        // }
                        $("#tableHD tbody").append(rec.html);
                        $("#HistoryModal").addClass("in");

                        $('.btn-view').on('click',function(){
                             btn_view($(this).data("value"));
                        });
                   } else {
                        notify("bottom", "left", "fas fa-times-circle", "danger", "", "", "ไม่สำเร็จ");
                   }
              }).fail(function(){

              });
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

         $(".js-example-data-array").select2();

         $('.btn-circle').on('click',function(){
              $('.btn-circle.btn-info').removeClass('btn-info').addClass('btn-default');
              $(this).addClass('btn-info').removeClass('btn-default').blur();
         });

         $('.next-step').on('click', function (e){
              e.preventDefault();
              numIndex();
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
                        notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "กรุณาระบุรหัสสินค้า");
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
                             $(".preloader").css("display", "block");
                        },
                   }).done(function(rec){
                        $(".preloader").css("display", "none");
                        $("#table1 tbody").empty();
                        if(rec.status==1){
                             let modify_good_name = ($("#GoodCode option:selected").text());
                             let span_product_name = modify_good_name.split(":");
                             $(".span_product_name").text("ชื่อสินค้า : " + span_product_name);
                             let tr = '';
                             var disable_radio = '';
                             var title_radio = '';
                             if (rec.datas.length > 0){
                                  var i = 0;
                                  $.each(rec.datas, function( key, data ) {
                                       if (i > 0){
                                            disable_radio = 'disabled';
                                            title_radio = 'ไม่สามารถเลือกได้ กรุณาเลือกรายการที่สร้างแรกสุด';
                                       }
                                       tr += '<tr title="'+title_radio+'">';
                                       tr += '<td>';
                                       tr += '<input type="radio" name="RefSOCOID" class="form-check ref_soco_id" data-count="'+i+'" '+disable_radio+' value="'+data.RefSOCOID+'">';
                                       tr += '<input type="hidden" name="ref_list_no" id="ref_list_no_'+data.RefSOCOID+'" value="'+data.RefListNo+'">';
                                       // tr += '<input type="hidden" name="ref_soco_no" id="ref_soco_no_'+data.RefSOCOID+'" value="'+data.RefSOCONo+'">';
                                       tr += '<input type="hidden" id="soco_id_'+data.RefSOCOID+'" value="'+data.RefSOCOID+'">';
                                       tr += '<input type="hidden" id="ship_date_'+data.RefSOCOID+'" value="'+data.ShipDate+'">';
                                       tr += '<input type="hidden" id="EmpCode'+data.RefSOCOID+'" value="'+data.EmpCode+'">';
                                       tr += '<input type="hidden" id="DocuDate2_'+data.RefSOCOID+'" value="'+data.DocuDate+'">';
                                       tr += '</td>';
                                       tr += '<td><span id="span_ref_soco_no_'+data.RefSOCOID+'">'+data.RefSOCONo+'</span></td>';
                                       tr += '<td><span id="span_docudate_'+data.RefSOCOID+'">'+ data.DocuDate +'</span></td>';
                                       // tr += '<td class="text-right"><span id="span_date_amount_'+data.RefSOCOID+'">'+jsDateDiff1(data.DocuDate, data.ShipDate)+'</span></td>';
                                       tr += '<td class="text-right"><span id="span_date_amount_'+data.RefSOCOID+'">'+data.DateDiff+'</span></td>';
                                       tr += '<td><span title="'+data.CustAddress+'" id="span_cus_address_'+data.RefSOCOID+'">'+ truncateString(data.CustAddress, 50) +'</span></td>';
                                       if (parseInt(data.GoodPrice2)){
                                            tr += '<td class="text-right"><span id="span_goodprice_'+data.RefSOCOID+'">'+parseInt(data.GoodPrice2).toFixed(2)+'</span></td>';
                                       } else {
                                            tr += '<td class="text-right"><span id="span_goodprice_'+data.RefSOCOID+'">'+data.GoodPrice2+'</span></td>';
                                       }
                                       tr += '<td class="text-right"><span id="span_tranqty_'+data.RefSOCOID+'">'+data.TranQty+'</span></td>';
                                       tr += '<td class="text-right">0</td>';
                                       tr += '</tr>';

                                       i++;
                                  });
                             } else {
                                  tr += '<tr><td colspan="8" align="center">ไม่พบข้อมูล</td></tr>';
                             }
                             $("#table1 tbody").append(tr);

                             var next = data+1;
                             $("#menu" + data).removeClass('active');
                             $("#menu" + data).removeClass('in');
                             $("#menu" + next).addClass('active');
                             $("#menu" + next).addClass('in');

                             $("#icon-"+data).removeClass('btn-info').addClass('btn-default');
                             $("#icon-"+next).addClass('btn-info').removeClass('btn-default');
                        } else {
                             swal("", rec.content, "warning");
                        }
                   }).fail(function(){
                        $(".preloader").css("display", "none");
                        swal("", rec.content, "error");
                   });
              }
              else if(data == 2) {
                   let modify_good_name = ($("#GoodCode option:selected").text());
                   let span_product_name = modify_good_name.split(":");
                   $(".span_product_name").text("ชื่อสินค้า : " + span_product_name);
                   $("#share_product_radio_1").prop("checked", true);
                   $("#share_product_radio_2").prop("checked", false);
                   $("#table2 tbody").empty();
                   $("#table3 tbody").empty();
                   var valids = new Array();
                   var doc_ids = new Array();
                   var cnt_radios = new Array();
                   $('.ref_soco_id').each(function(i, obj) {
                        valids.push($(obj).prop("checked"));
                        doc_ids.push($(obj).val());
                        cnt_radios.push($(obj).data("count"));
                   });
                   if (jQuery.inArray( true, valids ) != -1) {
                        for (var i = 0; i < valids.length; i++) {
                             if(valids[i] == true){
                                  if (cnt_radios[i] == 0){
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
                                       let refsocoid = $("#soco_id_"+doc_ids[i]).val();
                                       let RefListNO = $("#ref_list_no_"+doc_ids[i]).val();
                                       let DocuDate2 = $("#DocuDate2_"+doc_ids[i]).val();
                                       tr += '<tr>';
                                       tr += '<td><span id="tb2_refsocono">'+ref_soco_no+'</span>';
                                       tr += '<input type="hidden" name="ref_soco_no" id="tb2_ref_soco_no_hdn" value="'+ref_soco_no+'">';
                                       tr += '<input type="hidden" name="refsocoid" id="tb2_refsocoid" value="'+refsocoid+'">';
                                       tr += '<input type="hidden" name="goodcode" id="tb2_goodcode" value="'+goodcode+'">';
                                       tr += '<input type="hidden" name="shipdate" id="tb2_shipdate" value="'+shipdate+'">';
                                       tr += '<input type="hidden" name="EmpCode" id="tb2_EmpCode" value="'+EmpCode+'">';
                                       tr += '<input type="hidden" name="RefListNO" id="tb2_RefListNO" value="'+RefListNO+'">';
                                       tr += '<input type="hidden" name="DocuDate2" id="tb2_DocuDate2" value="'+DocuDate2+'">';
                                       tr += '</td>';
                                       tr += '<td><span id="tb2_docudate">'+docudate+'</span></td>';
                                       tr += '<td><span id="tb2_shipdate2">'+ConvertDateToEng(shipdate)+'</span></td>';
                                       tr += '<td class="text-right"><span id="tb2_date_amount">'+date_amount+'</span></td>';
                                       tr += '<td><span title="'+cus_address+'" id="tb2_cus_address">'+ truncateString(cus_address, 50)+'</span></td>';
                                       tr += '<td class="text-right"><span id="tb2_goodprice">'+goodprice+'</span></td>';
                                       tr += '<td class="text-right"><span id="product_amount_tranqty">'+tranqty+'</span></td>';
                                       tr += '<td class="text-right"><span id="product_amount_sent">0</span></td>';
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
                                                 $(".preloader").css("display", "block");
                                            },
                                       }).done(function(rec){
                                            $(".preloader").css("display", "none");
                                            $("#table3 tbody").empty();
                                            if(rec.status==1){
                                                 let tr = '';
                                                 let chkbox = '';
                                                 let find_string = '';
                                                 if (rec.datas.length > 0){
                                                      $.each(rec.datas, function( key, data ) {
                                                           find_string = (data.ContainerNO).includes("@");
                                                           if (find_string == false){
                                                                // console.log(getMonthNum($("#tb2_shipdate2").text()));
                                                                if (data.Flag_st.length == 0 && (parseInt(getMonthNum($("#tb2_shipdate").val())) == parseInt(getMonthNum(data.ShipDate)))) {
                                                                     chkbox = '<input type="checkbox" id="product_share_chk_'+data.RefSOCOID+'" class="form-check-input product_share_chk product_share_chk_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'" data-value="'+data.RefSOCOID+'" data-container="'+data.ContainerNO+'" data-reflistno="'+data.RefListNo+'" value="'+data.RefSOCOID+'">';
                                                                } else {
                                                                     chkbox = '';
                                                                }
                                                                tr += '<tr>';
                                                                tr += '<td>';
                                                                tr += chkbox;
                                                                tr += '</td>';
                                                                tr += '<td>';
                                                                tr += '<input type="hidden" id="RefSOCOID_'+data.RefSOCOID+'" class="RefSOCOID_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'" value="'+data.RefSOCOID+'">';
                                                                tr += '<input type="hidden" id="RefListNO_'+data.RefSOCOID+'" class="RefListNO_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'" value="'+data.RefListNo+'">';
                                                                tr += '<input type="hidden" id="CustName_'+data.RefSOCOID+'" class="CustName_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'" value="'+data.EmpName+'">';
                                                                tr += '<input type="hidden" id="EmpCode_'+data.RefSOCOID+'" class="EmpCode_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'" value="'+data.EmpCode+'">';
                                                                tr += '<input type="hidden" id="DocuDate2_'+data.RefSOCOID+'" class="DocuDate2_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'" value="'+data.DocuDate+'">';
                                                                tr += '<span id="RefSOCONo_'+data.RefSOCOID+'" class="RefSOCONo_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'">'+data.RefSOCONo+'</span>';
                                                                tr += '</td>';
                                                                // tr += '<td><span id="DocuDate_'+data.RefSOCOID+'">'+ formatDate(data.DocuDate) +'</span></td>';
                                                                tr += '<td><span id="DocuDate_'+data.RefSOCOID+'" class="DocuDate_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'">'+ data.ShipDate +'</span></td>';
                                                                tr += '<td><span id="EmpName_'+data.RefSOCOID+'" class="EmpName_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'">'+data.CustName+'</span></td>';
                                                                tr += '<td><span>'+data.EmpName+'</span></td>';
                                                                tr += '<td><span id="ContainerNO_'+data.RefSOCOID+'" class="ContainerNO_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'">'+data.ContainerNO+'</span></td>';
                                                                tr += '<td><span id="Flag_st_'+data.RefSOCOID+'" class="Flag_st_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'">'+data.Flag_st+'</span></td>';
                                                                tr += '<td class="text-right"><span id="TranQty_'+data.RefSOCOID+'" class="TranQty_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'">'+data.TranQty+'</span></td>';
                                                                tr += '<td><input type="text" data-value="'+data.RefSOCOID+'" data-reflistno="'+data.RefListNo+'" data-container="'+data.ContainerNO+'" class="form-control product_share product_share_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+' number-only" id="product_share_'+data.RefSOCOID+'" readonly="readonly" /></td>';
                                                                tr += '</tr>';
                                                           }
                                                      });
                                                 } else {
                                                      tr += '<tr><td colspan="8" align="center">ไม่พบข้อมูล</td></tr>';
                                                 }
                                                 $("#table3 tbody").append(tr);

                                                 $('.product_share_chk').on('click', function() {
                                                      var val = $(this).data("value");
                                                      var container = $(this).data("container");
                                                      var reflistno = $(this).data("reflistno");
                                                      if ($(this).is(':checked')) {
                                                           $(".product_share_" + val + "_" + container + "_" + reflistno).attr("readonly", false);
                                                           $(".product_share_" + val + "_" + container + "_" + reflistno).focus();
                                                      } else {
                                                           $(".product_share_" + val + "_" + container + "_" + reflistno).attr("readonly", true);
                                                           $(".product_share_" + val + "_" + container + "_" + reflistno).val("");
                                                      }
                                                      numIndex();
                                                 });

                                                 $('.product_share').on('keyup', function() {
                                                      var data = $(this).val();
                                                      var data_value = $(this).data("value");
                                                      var container = $(this).data("container");
                                                      var reflistno = $(this).data("reflistno");
                                                      var tran_qty = $(".TranQty_"+data_value+"_"+container+"_"+reflistno).text();
                                                      if (parseInt(data) > parseInt(tran_qty)) {
                                                           notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "ห้ามกรอกเกินจำนวนสินค้าสั่งจอง");
                                                           $(this).val("");
                                                           $(this).focus();
                                                      } else {
                                                           numIndex();
                                                      }
                                                 });
                                                 var next = data+1;
                                                 $("#menu" + data).removeClass('active');
                                                 $("#menu" + data).removeClass('in');
                                                 $("#menu" + next).addClass('active');
                                                 $("#menu" + next).addClass('in');

                                                 $("#icon-"+data).removeClass('btn-info').addClass('btn-default');
                                                 $("#icon-"+next).addClass('btn-info').removeClass('btn-default');
                                            } else {
                                                 if(rec.status == 2) {
                                                      notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "ไม่สามารถเลือกได้ เนื่่องจากรายการดังกล่าวกำลังอยู่ระหว่างดำเนินการ");
                                                      return false;
                                                 } else {
                                                      notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "มีบางอย่างผิดพลาด");
                                                      return false;
                                                 }
                                            }
                                       }).fail(function(){
                                            $(".preloader").css("display", "none");
                                            swal("", "", "error");
                                            return false;
                                       });
                                  } else {
                                       notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "กรุณาเลือกรายการแรก");
                                       return false;
                                  }
                             }
                        }
                   } else {
                        notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "กรุณาเลือกอย่างน้อย 1 รายการ");
                        return false;
                   }
              }
              else if (data == 3) {
                   $("#table4 tbody").empty();
                   $("#table4 tfoot").empty();
                   $("#table5 tbody").empty();
                   var valids = new Array();
                   var product_share_chk_arr = new Array();
                   var product_share_chk_arr2 = new Array();
                   var product_share_chk_arr3 = new Array();
                   $('.product_share_chk').each(function(i, obj) {
                        valids.push($(obj).prop("checked"));
                        product_share_chk_arr.push($(obj).data("value"));
                        product_share_chk_arr2.push($(obj).data("container"));
                        product_share_chk_arr3.push($(obj).data("reflistno"));
                   });

                   if (jQuery.inArray(true, valids) != -1) {
                        let sum_total = 0;
                        for (var i = 0; i < product_share_chk_arr.length; i++) {
                             if($(".product_share_" + product_share_chk_arr[i] + '_' + product_share_chk_arr2[i] + '_' + product_share_chk_arr3[i]).val() == ''){
                                  if ($(".product_share_chk_" + product_share_chk_arr[i] + '_' + product_share_chk_arr2[i] + '_' + product_share_chk_arr3[i]).prop("checked")){
                                       notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "กรุณากรอกช่องจำนวนสินค้าแบ่งให้");
                                       return false;
                                  }
                             } else {
                                  if ($(".product_share_" + product_share_chk_arr[i] + '_' + product_share_chk_arr2[i] + '_' + product_share_chk_arr3[i]).val()){
                                       sum_total = sum_total + parseInt($(".product_share_" + product_share_chk_arr[i] + '_' + product_share_chk_arr2[i] + '_' + product_share_chk_arr3[i]).val());
                                  } else {
                                       sum_total = sum_total + 0;
                                  }


                                  // let RefSOCOID = $("#RefSOCOID_" + product_share_chk_arr[i]).val();
                                  // let RefListNO = $("#RefListNO_" + product_share_chk_arr[i]).val();
                                  // let CustName = $("#CustName_" + product_share_chk_arr[i]).val();
                                  // let EmpCode = $("#EmpCode_" + product_share_chk_arr[i]).val();
                                  // let RefSOCONo = $("#RefSOCONo_" + product_share_chk_arr[i]).text();
                                  // let DocuDate = $("#DocuDate_" + product_share_chk_arr[i]).text();
                                  // let DocuDate2 = $("#DocuDate2_" + product_share_chk_arr[i]).val();
                                  // let EmpName = $("#EmpName_" + product_share_chk_arr[i]).text();
                                  // let ContainerNO = $("#ContainerNO_" + product_share_chk_arr[i]).text();
                                  // let Flag_st = $("#Flag_st_" + product_share_chk_arr[i]).text();
                                  // let TranQty = $("#TranQty_" + product_share_chk_arr[i]).text();
                                  // let product_share = $("#product_share_" + product_share_chk_arr[i]).val();
                                  let RefSOCOID = $(".RefSOCOID_" + product_share_chk_arr[i] + '_' + product_share_chk_arr2[i] + '_' + product_share_chk_arr3[i]).val();
                                  let RefListNO = $(".RefListNO_" + product_share_chk_arr[i] + '_' + product_share_chk_arr2[i] + '_' + product_share_chk_arr3[i]).val();
                                  let CustName = $(".CustName_" + product_share_chk_arr[i] + '_' + product_share_chk_arr2[i] + '_' + product_share_chk_arr3[i]).val();
                                  let EmpCode = $(".EmpCode_" + product_share_chk_arr[i] + '_' + product_share_chk_arr2[i] + '_' + product_share_chk_arr3[i]).val();
                                  let RefSOCONo = $(".RefSOCONo_" + product_share_chk_arr[i] + '_' + product_share_chk_arr2[i] + '_' + product_share_chk_arr3[i]).text();
                                  let DocuDate = $(".DocuDate_" + product_share_chk_arr[i] + '_' + product_share_chk_arr2[i] + '_' + product_share_chk_arr3[i]).text();
                                  let DocuDate2 = $(".DocuDate2_" + product_share_chk_arr[i] + '_' + product_share_chk_arr2[i] + '_' + product_share_chk_arr3[i]).val();
                                  let EmpName = $(".EmpName_" + product_share_chk_arr[i] + '_' + product_share_chk_arr2[i] + '_' + product_share_chk_arr3[i]).text();
                                  let ContainerNO = $(".ContainerNO_" + product_share_chk_arr[i] + '_' + product_share_chk_arr2[i] + '_' + product_share_chk_arr3[i]).text();
                                  let Flag_st = $(".Flag_st_" + product_share_chk_arr[i] + '_' + product_share_chk_arr2[i] + '_' + product_share_chk_arr3[i]).text();
                                  let TranQty = $(".TranQty_" + product_share_chk_arr[i] + '_' + product_share_chk_arr2[i] + '_' + product_share_chk_arr3[i]).text();
                                  let product_share = $(".product_share_" + product_share_chk_arr[i] + '_' + product_share_chk_arr2[i] + '_' + product_share_chk_arr3[i]).val();

                                  let tr = '';
                                  tr += '<tr>';
                                  tr += '<td class="text-center">';
                                  tr += RefSOCONo;
                                  tr += '<input type="hidden" name="tb4_RefSOCOID[]" value="'+RefSOCOID+'">';
                                  tr += '<input type="hidden" name="tb4_RefListNO[]" value="'+RefListNO+'">';
                                  tr += '<input type="hidden" name="tb4_RefSOCONo[]" value="'+RefSOCONo+'">';
                                  tr += '<input type="hidden" name="tb4_DocuDate[]" value="'+DocuDate2+'">';
                                  tr += '<input type="hidden" name="tb4_CustName[]" value="'+CustName+'">';
                                  tr += '<input type="hidden" name="tb4_EmpCode[]" value="'+EmpCode+'">';
                                  tr += '<input type="hidden" name="tb4_EmpName[]" value="'+EmpName+'">';
                                  tr += '<input type="hidden" name="tb4_ContainerNO[]" value="'+ContainerNO+'">';
                                  tr += '<input type="hidden" name="tb4_Flag_st[]" value="'+Flag_st+'">';
                                  tr += '<input type="hidden" name="tb4_TranQty[]" value="'+TranQty+'">';
                                  tr += '<input type="hidden" name="tb4_SplitQty[]" value="'+product_share+'">';
                                  tr += '</td>';
                                  tr += '<td class="text-center">'+DocuDate+'</td>';
                                  tr += '<td class="text-left">'+EmpName+'</td>';
                                  tr += '<td class="text-center">'+ContainerNO+'</td>';
                                  tr += '<td class="text-center">'+Flag_st+'</td>';
                                  tr += '<td class="text-right">'+TranQty+'</td>';
                                  tr += '<td class="text-right">'+product_share+'</td>';
                                  tr += '</tr>';
                                  $("#table4 tbody").append(tr);

                             }

                        }
                        if (sum_total > parseInt($("#sum_amount_product").text())){
                             notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "รวมจำนวนสินค้าต้องไม่เกินจำนวนสินค้าสั่งจอง");
                             return false;
                        } else {
                             let tf = '';
                             tf += '<tr>';
                             tf += '<td colspan="6" class="text-right">รวมจำนวนสินค้า</td>';
                             tf += '<td class="text-right">'+sum_total+'</td>';
                             tf += '</tr>';
                             $("#table4 tfoot").append(tf);

                             let tb2_refsocoid = $("#tb2_refsocoid").val();
                             let tb2_RefListNO = $("#tb2_RefListNO").val();
                             let tb2_DocuDate2 = $("#tb2_DocuDate2").val();
                             let tb2_refsocono = $("#tb2_refsocono").text();
                             let tb2_goodcode = $("#tb2_goodcode").val();
                             let tb2_shipdate = $("#tb2_shipdate").val();
                             let tb2_EmpCode = $("#tb2_EmpCode").val();
                             let tb2_docudate = $("#tb2_docudate").text();
                             let tb2_date_amount = $("#tb2_date_amount").text();
                             let tb2_cus_address = $("#tb2_cus_address").text();
                             let tb2_goodprice = $("#tb2_goodprice").text();
                             let product_amount_tranqty = $("#product_amount_tranqty").text();
                             let tr = '';

                             var modify_good_name = ($("#GoodCode option:selected").text());
                             var a = modify_good_name.split(":");
                             tr += '<tr>';
                             tr += '<td class="text-center">';
                             tr += tb2_refsocono;
                             tr += '<input type="hidden" name="GoodCode" value="'+tb2_goodcode+'">'
                             tr += '<input type="hidden" name="GoodName1" value="'+a[1]+'">'
                             tr += '<input type="hidden" name="ShipDate" value="'+tb2_shipdate+'">'
                             tr += '<input type="hidden" name="RefSOCOID" value="'+tb2_refsocoid+'">'
                             tr += '<input type="hidden" name="RefListNO" value="'+tb2_RefListNO+'">'
                             tr += '<input type="hidden" name="RefSOCONo" value="'+tb2_refsocono+'">'
                             tr += '<input type="hidden" name="DocuDate2" value="'+tb2_DocuDate2+'">'
                             tr += '<input type="hidden" name="CustAddress" value="'+tb2_cus_address+'">'
                             tr += '<input type="hidden" name="GoodPrice2" value="'+tb2_goodprice+'">'
                             tr += '<input type="hidden" name="TranQty" value="'+product_amount_tranqty+'">'
                             tr += '<input type="hidden" name="SentQty" value="'+sum_total+'">'
                             tr += '</td>';
                             tr += '<td class="text-center">'+tb2_docudate+'</td>';
                             tr += '<td class="text-right">'+tb2_date_amount+'</td>';
                             tr += '<td class="text-left"><span title="'+tb2_cus_address+'">'+tb2_cus_address+'</span></td>';
                             tr += '<td class="text-right">'+tb2_goodprice+'</td>';
                             tr += '<td class="text-right">'+product_amount_tranqty+'</td>';
                             tr += '<td class="text-right">'+sum_total+'</td>';
                             tr += '</tr>';
                             $("#table5 tbody").append(tr);

                             var next = data+1;
                             $("#menu" + data).removeClass('active');
                             $("#menu" + data).removeClass('in');
                             $("#menu" + next).addClass('active');
                             $("#menu" + next).addClass('in');

                             $("#icon-"+data).removeClass('btn-info').addClass('btn-default');
                             $("#icon-"+next).addClass('btn-info').removeClass('btn-default');
                        }
                   } else {
                        notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "กรุณาเลือกอย่างน้อย 1 รายการ");
                        return false;
                   }

              }

         });

         $('.prev-step').on('click', function (e){
              e.preventDefault();
              numIndex();
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
              numIndex();
              $.ajax({
                   method : "post",
                   url : '{{ route('customer.get_product')}}',
                   dataType : 'json',
                   data : $("#get_product_form").serialize(),
                   headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                   },
                   beforeSend: function() {
                        $(".preloader").css("display", "block");
                   },
              }).done(function(rec){
                   $(".preloader").css("display", "none");
                   $("#table3 tbody").empty();
                   if(rec.status==1){
                        let tr = '';
                        let find_string = '';
                        if (rec.datas.length > 0){
                             $.each(rec.datas, function( key, data ) {
                                  find_string = (data.ContainerNO).includes("@");
                                  if (find_string == false){
                                        // console.log(jsDateDiff1(formatDate($("#tb2_shipdate").text()), data.ShipDate));
                                        // console.log(jsDateDiff1(formatDate($("#tb2_shipdate2").text()), data.ShipDate));
                                        // console.log(getMonthNum($("#tb2_shipdate2").text()) + "++" + getMonthNum(data.ShipDate));
                                        if (data.Flag_st.length == 0 && (parseInt(getMonthNum($("#tb2_shipdate").val())) == parseInt(getMonthNum(data.ShipDate)))) {
                                            chkbox = '<input type="checkbox" id="product_share_chk_'+data.RefSOCOID+'" class="form-check-input product_share_chk product_share_chk_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'" data-value="'+data.RefSOCOID+'" data-container="'+data.ContainerNO+'" data-reflistno="'+data.RefListNo+'" value="'+data.RefSOCOID+'">';
                                       } else {
                                            chkbox = '';
                                       }
                                       // tr += '<tr>';
                                       // tr += '<td>';
                                       // tr += chkbox;
                                       // tr += '</td>';
                                       // tr += '<td>';
                                       // tr += '<input type="hidden" id="RefSOCOID_'+data.RefSOCOID+'" value="'+data.RefSOCOID+'">';
                                       // tr += '<input type="hidden" id="RefListNO_'+data.RefSOCOID+'" value="'+data.RefListNo+'">';
                                       // tr += '<input type="hidden" id="CustName_'+data.RefSOCOID+'" value="'+data.EmpName+'">';
                                       // tr += '<input type="hidden" id="EmpCode_'+data.RefSOCOID+'" value="'+data.EmpCode+'">';
                                       // tr += '<input type="hidden" id="DocuDate2_'+data.RefSOCOID+'" value="'+data.DocuDate+'">';
                                       // tr += '<span id="RefSOCONo_'+data.RefSOCOID+'">'+data.RefSOCONo+'</span>';
                                       // tr += '</td>';
                                       // // tr += '<td><span id="DocuDate_'+data.RefSOCOID+'">'+ formatDate(data.DocuDate) +'</span></td>';
                                       // tr += '<td><span id="DocuDate_'+data.RefSOCOID+'">'+ data.ShipDate +'</span></td>';
                                       // tr += '<td><span id="EmpName_'+data.RefSOCOID+'">'+data.CustName+'</span></td>';
                                       // tr += '<td><span id="ContainerNO_'+data.RefSOCOID+'">'+data.ContainerNO+'</span></td>';
                                       // tr += '<td><span id="Flag_st_'+data.RefSOCOID+'">'+data.Flag_st+'</span></td>';
                                       // tr += '<td class="text-right"><span id="TranQty_'+data.RefSOCOID+'">'+data.TranQty+'</span></td>';
                                       // tr += '<td><input type="text" data-value="'+data.RefSOCOID+'" class="form-control product_share product_share_'+data.RefSOCOID+'_'+data.ContainerNO+' number-only" id="product_share_'+data.RefSOCOID+'" readonly="readonly" /></td>';
                                       // tr += '</tr>';
                                       tr += '<tr>';
                                       tr += '<td>';
                                       tr += chkbox;
                                       tr += '</td>';
                                       tr += '<td>';
                                       tr += '<input type="hidden" id="RefSOCOID_'+data.RefSOCOID+'" class="RefSOCOID_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'" value="'+data.RefSOCOID+'">';
                                       tr += '<input type="hidden" id="RefListNO_'+data.RefSOCOID+'" class="RefListNO_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'" value="'+data.RefListNo+'">';
                                       tr += '<input type="hidden" id="CustName_'+data.RefSOCOID+'" class="CustName_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'" value="'+data.EmpName+'">';
                                       tr += '<input type="hidden" id="EmpCode_'+data.RefSOCOID+'" class="EmpCode_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'" value="'+data.EmpCode+'">';
                                       tr += '<input type="hidden" id="DocuDate2_'+data.RefSOCOID+'" class="DocuDate2_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'" value="'+data.DocuDate+'">';
                                       tr += '<span id="RefSOCONo_'+data.RefSOCOID+'" class="RefSOCONo_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'">'+data.RefSOCONo+'</span>';
                                       tr += '</td>';
                                       // tr += '<td><span id="DocuDate_'+data.RefSOCOID+'">'+ formatDate(data.DocuDate) +'</span></td>';
                                       tr += '<td><span id="DocuDate_'+data.RefSOCOID+'" class="DocuDate_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'">'+ data.ShipDate +'</span></td>';
                                       tr += '<td><span id="EmpName_'+data.RefSOCOID+'" class="EmpName_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'">'+data.CustName+'</span></td>';
                                       tr += '<td><span>'+data.EmpName+'</span></td>';
                                       tr += '<td><span id="ContainerNO_'+data.RefSOCOID+'" class="ContainerNO_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'">'+data.ContainerNO+'</span></td>';
                                       tr += '<td><span id="Flag_st_'+data.RefSOCOID+'" class="Flag_st_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'">'+data.Flag_st+'</span></td>';
                                       tr += '<td class="text-right"><span id="TranQty_'+data.RefSOCOID+'" class="TranQty_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+'">'+data.TranQty+'</span></td>';
                                       tr += '<td><input type="text" data-value="'+data.RefSOCOID+'" data-reflistno="'+data.RefListNo+'" data-container="'+data.ContainerNO+'" class="form-control product_share product_share_'+data.RefSOCOID+'_'+data.ContainerNO+'_'+data.RefListNo+' number-only" id="product_share_'+data.RefSOCOID+'" readonly="readonly" /></td>';
                                       tr += '</tr>';
                                  }
                             });
                        } else {
                             tr += '<tr><td colspan="8" align="center">ไม่พบข้อมูล</td></tr>';
                        }
                        $("#table3 tbody").append(tr);

                        $('.product_share_chk').on('click', function() {
                             var val = $(this).data("value");
                             var container = $(this).data("container");
                             var reflistno = $(this).data("reflistno");
                             if ($(this).is(':checked')) {
                                  $(".product_share_" + val + "_" + container + "_" + reflistno).attr("readonly", false);
                                  $(".product_share_" + val + "_" + container + "_" + reflistno).focus();
                             } else {
                                  $(".product_share_" + val + "_" + container + "_" + reflistno).attr("readonly", true);
                                  $(".product_share_" + val + "_" + container + "_" + reflistno).val("");
                             }
                             numIndex();
                        });

                        $('.product_share').on('keyup', function() {
                             var data = $(this).val();
                             var data_value = $(this).data("value");
                             var container = $(this).data("container");
                             var reflistno = $(this).data("reflistno");
                             var tran_qty = $(".TranQty_"+data_value+"_"+container+"_"+reflistno).text();
                             if (parseInt(data) > parseInt(tran_qty)) {
                                  notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "ห้ามกรอกเกินจำนวนสินค้าสั่งจอง");
                                  $(this).val("");
                                  $(this).focus();
                             } else {
                                  numIndex();
                             }
                        });
                   } else {
                        swal("", rec.content, "warning");
                   }
              }).fail(function(){
                   $(".preloader").css("display", "none");
                   swal("", rec.content, "error");
              });
         });

         $('#FormAdd').validate({
              errorElement: 'div',
              errorClass: 'invalid-feedback',
              focusInvalid: false,
              rules: {

              },
              messages: {

              },
              highlight: function (e) {
                   validate_highlight(e);
              },
              success: function (e) {
                   validate_success(e);
              },
              errorPlacement: function (error, element) {
                   validate_errorplacement(error, element);
              },
              submitHandler: function (form) {

                   $("#FormAdd").find('[type="submit"]').prop('disabled', true);
                   share_product_radio = $('input[name=share_product_radio]:checked').val();
                   data = $("#FormAdd").serializeArray();
                   data.push({ name: 'DocuNO', value: $("#DocuNO").val()});
                   data.push({ name: 'DocuDate', value: $("#DocuDate").val()});
                   data.push({ name: 'CustCode', value: $("#CustCode").val()});
                   data.push({ name: 'CustName', value: $("#CustName").val()});
                   data.push({ name: 'EmpCode', value: $("#EmpCode").val()});
                   data.push({ name: 'empname', value: $("#empname").val()});
                   data.push({ name: 'share_product_radio', value: share_product_radio});
                   $.ajax({
                        method : "POST",
                        url : '{{ route('customer.store') }}',
                        dataType : 'json',
                        data : data,
                        headers: {
                             'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                   }).done(function(rec){
                        if (rec.status == 1) {
                             notify("bottom", "left", "fas fa-check-circle", "success", "", "", "สำเร็จ");
                             $("#menu4").removeClass('active');
                             $("#menu4").removeClass('in');
                             $("#menu5").addClass('active');
                             $("#menu5").addClass('in');
                        } else if (rec.status == 2) {
                             $("#FormAdd").find('[type="submit"]').prop('disabled', false);
                             notify("bottom", "left", "fas fa-exclamation-circle", "danger", "", "", "ไม่สามารถเลือกได้ เนื่่องจากรายการดังกล่าวกำลังอยู่ระหว่างดำเนินการ");
                             return false;
                        }else {
                             notify("bottom", "left", "fas fa-times-circle", "danger", "", "", "ไม่สำเร็จ");
                        }
                   }).fail(function(){
                        notify("bottom", "left", "fas fa-times-circle", "danger", "", "", "มีบางอย่างผิดพลาด");
                   });
              },
              invalidHandler: function (form) {

              }
         });
    });

    </script>
</body>

</html>
