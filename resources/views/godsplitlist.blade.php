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
     <!-- data tables css -->
    <link rel="stylesheet" href="assets/css/plugins/dataTables.bootstrap4.min.css">
    <!-- daterangepicker -->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/daterangepicker.css')}}">
     <!-- vendor css -->
     <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
     <style>
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
                                        <div class="row m-3">
                                             <div class="col-md-6">
                                                  <form action="" method="GET">
                                                       <div class="form-group">
                                                            <label>วันที่เอกสาร</label>
                                                            <input type="text" name="daterange" autocomplete="off" class="form-control w-50" value="{{ isset($_GET["daterange"]) ? $_GET["daterange"] : $daterange }}" />
                                                       </div>
                                                       <div class="form-group">
                                                            <input type="submit" class="btn btn-primary" value="Search">
                                                       </div>
                                                  </form>
                                             </div>
                                        </div>
                                        <div class="dt-responsive table-responsive">
                                             <table id="simpletable" class="table table-striped table-bordered nowrap">
                                                  <thead>
                                                       <tr>
                                                            <th class="border-top-0 text-center">No</th>
                                                            <th class="border-top-0 text-center">เลขที่เอกสาร</th>
                                                            <th class="border-top-0 text-center">เลขที่ใบจอง</th>
                                                            <th class="border-top-0 text-center">วันที่เอกสาร</th>
                                                            <th class="border-top-0 text-center">วันที่นัดส่ง</th>
                                                            <th class="border-top-0 text-center">ชื่อลูกค้า</th>
                                                            <th class="border-top-0 text-center">ชื่อพนักงานขาย</th>
                                                            <th class="border-top-0 text-center">ชื่อสินค้า</th>
                                                            <th class="border-top-0 text-center">อนุมัติคำขอ</th>
                                                            <th class="border-top-0 text-center">ยืนยัน<br/>แบ่งสินค้า</th>
                                                            <th class="border-top-0 text-center">action</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @php $i=1; @endphp
                                                       @if (count($headers) > 0)
                                                            @foreach ($headers as $key => $header)
                                                                 <tr>
                                                                      <td>{{$i}}</td>
                                                                      <td>{{$header->DocuNO}}</td>
                                                                      <td>{{$header->RefSOCONo}}</td>
                                                                      <td>{{ date_format(date_create($header->DocuDate), "d M Y")}}</td>
                                                                      <td>{{ date_format(date_create($header->ShipDate), "d M Y")}}</td>
                                                                      <td>{{$header->CustName}}</td>
                                                                      <td>{{$header->EmpName}}</td>
                                                                      <td>{{$header->GoodName1}}</td>
                                                                      <td class="text-center">
                                                                           {{-- {{$header->AppvStatus}} --}}
                                                                           <div class="btn-group btn-group-sm" id="wait_approve_div_{{$header->DocuNO}}">
                                                                           @if ($header->AppvStatus == 'N')
                                                                                <span class="badge badge-warning" title="รออนุมัติ">รออนุมัติ</span>
                                                                           @elseif($header->AppvStatus == 'Y')
                                                                                <span class="badge badge-success" title="Approve"><i class="fas fa-check-circle f-18 analytic-icon"></i></span>
                                                                           @elseif($header->AppvStatus == 'C')
                                                                                <span class="badge badge-danger" title="Not Approve"><i class="fas fa-window-close f-18 analytic-icon"></i></span>
                                                                           @endif
                                                                           </div>
                                                                      </td>
                                                                      <td class="text-center">
                                                                           {{-- {{$header->AppvSplitStatus}} --}}
                                                                           <div class="btn-group btn-group-sm" id="approve_div_{{$header->DocuNO}}">
                                                                                @if ($header->AppvSplitStatus == 'N')
                                                                                     <span class="badge badge-warning" title="รออนุมัติ">รออนุมัติ</span>
                                                                                @elseif($header->AppvSplitStatus == 'Y')
                                                                                     <span class="badge badge-success" title="Approve"><i class="fas fa-check-circle f-18 analytic-icon"></i></span>
                                                                                @elseif($header->AppvSplitStatus == 'R')
                                                                                     <span class="badge badge-danger" title="Reject"><i class="fas fa-window-close f-18 analytic-icon"></i></span>
                                                                                @endif
                                                                           </div>

                                                                      </td>
                                                                      <td class="text-center">
                                                                           <div class="btn-group btn-group-sm" id="action_div_{{$header->DocuNO}}">
                                                                           @if ($header->AppvStatus == 'N')
                                                                                <button id="btn-edit-{{$header->DocuNO}}" class="btn btn-warning btn-edit text-white" data-value="{{$header->DocuNO}}" data-toggle="modal" data-target="#ModalEdit">
                                                                                     <i class="ace-icon feather icon-edit-1 bigger-120"></i>
                                                                                </button>
                                                                           @else
                                                                                <button id="btn-view-{{$header->DocuNO}}" class="btn btn-primary btn-edit text-white" data-value="{{$header->DocuNO}}" data-toggle="modal" data-target="#ModalEdit">
                                                                                     <i class="fas fa-eye bigger-120"></i>
                                                                                </button>
                                                                           @endif
                                                                           </div>
                                                                      </td>
                                                                 </tr>
                                                                 @php $i++; @endphp
                                                            @endforeach
                                                       @else
                                                            <tr>
                                                                 <td colspan="10" class="text-center">ไม่พบข้อมูล</td>
                                                            </tr>
                                                       @endif
                                                  </tbody>
                                             </table>
                                             {{ $headers->links() }}
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <!-- [ Main Content ] end -->
                    <div class="row">
                         <div class="col-12">
                              <button class="btn btn-primary btn-test text-white">
                                   <i class="fas fa-sync-alt"></i> Refresh
                              </button>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <!-- Modal Edit -->
     <div class="modal fade bd-example-modal-lg" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-lg">
               <div class="modal-content">
                    <form id="FormEdit">
                         <div class="modal-header">
                              <h5 class="modal-title h4" id="myLargeModalLabel">แบ่งจาก</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         </div>
                         <div class="modal-body">
                                   <div class="dt-responsive table-responsive">
                                        <table id="simpletable2" class="table table-striped table-bordered nowrap">
                                             <thead>
                                             </thead>
                                             <tbody>
                                             </tbody>
                                             <tfoot>
                                             </tfoot>
                                        </table>
                                   </div>
                         </div>
                         <div class="modal-footer">
                              <button class="btn btn-success text-white" name="AppvStatus" value="Y">
                                   <i class="fas fa-check-circle bigger-120"></i> Approve
                              </button>
                              <button class="btn btn-danger text-white" name="AppvStatus" value="C">
                                   <i class="fas fa-trash bigger-120"></i> Cancel
                              </button>
                         </div>
                         <input type="hidden" name="daterange_modal" id="daterange_modal" value="">
                    </form>
               </div>
          </div>
     </div>
     <!-- end Modal edit -->
     <div id="preloaders" class="preloader" style="display:none;"></div>
     <!-- Required Js -->
     <script src="{{asset('assets/js/vendor-all.min.js')}}"></script>
     <script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
     <script src="{{asset('assets/js/pcoded.min.js')}}"></script>
     {{-- <script src="{{asset('assets/js/menu-setting.min.js')}}"></script> --}}
     <!-- datatable Js -->
     <script src="{{asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
     <script src="{{asset('assets/js/plugins/dataTables.bootstrap4.min.js')}}"></script>
     <!-- daterangepicker -->
     <script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
     <script src="{{asset('assets/js/plugins/daterangepicker.js')}}"></script>
     <!-- jquery-validation Js -->
     <script src="{{asset('assets/js/plugins/jquery.validate.min.js')}}"></script>
     <!-- sweet alert Js -->
     <script src="{{asset('assets/js/plugins/sweetalert.min.js')}}"></script>
     <script type="text/javascript">

     var date_range = '{{$daterange}}';
     $(function() {
          // if (date_range.length > 0){
          //      const myArr = date_range.split("-");
          //      let start_date = myArr[0].trim();
          //      let end_date = myArr[1].trim();
          //
          //      $('input[name="daterange"]').val((start_date) + ' - ' + (end_date));
          //      $('#daterange_modal').val((start_date) + ' - ' + (end_date));
          // }
          //
          // $('input[name="daterange"]').daterangepicker({
          //      autoUpdateInput: false,
          //      opens: 'left',
          //      dateFormat: 'dd-mm-yy',
          //      locale: {
          //           cancelLabel: 'Clear'
          //      }
          // });
          //
          // $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
          //      $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
          // });

          $('input[name="daterange"]').daterangepicker({
               locale: {
                    format: 'DD MMM YYYY'
               },
               opens: 'left'
          }, function(start, end, label) {

          });

          $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
               $(this).val('');
          });

     });

     $(document).ready(function() {
             // $('#simpletable').DataTable({
             //       "processing": true,
             //       "serverSide": false,
             //       "paging": true,
             //       "pageLength": 10,
             //  });
             $('#simpletable2').DataTable({
                   // "processing": true,
                   // "autoWidth": false,
                   "scrollX": true,
                   "scrollY": true,
                   "serverSide": false,
                   "ordering": false,
                   "paging": false,
              });
     });


     $('body').on('click', '.btn-edit', function (e) {
          e.preventDefault();
          var data = $(this).data('value');
          $.ajax({
               method : "post",
               url : '{{ route('godsplit.get_detail') }}',
               data : {"DocuNO" : data},
               dataType : 'json',
               headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
               },
               beforeSend: function() {
                    $(".preloader").css("display", "block");
               },
          }).done(function(rec){
               if (rec.status == 1){
                    let th = '';
                    let tr = '';
                    let tf = '';
                    let sum = 0;
                    if (rec.details.length > 0){
                         $("#modal-footer").html("");
                         $("#simpletable2 thead").empty();
                         $("#simpletable2 tbody").empty();
                         $("#simpletable2 tfoot").empty();
                         var i = 1;
                         let flag = '';
                         $.each(rec.details, function( key, data ) {
                              th += '<tr>';
                              th += '     <th style="width: 10%" class="border-top-0 text-center">No</th>';
                              th += '     <th style="width: 10%" class="border-top-0 text-center">เลขที่เอกสาร</th>';
                              th += '     <th style="width: 10%" class="border-top-0 text-center">เลขที่ใบจอง</th>';
                              th += '     <th style="width: 10%" class="border-top-0 text-center">วันที่จอง</th>';
                              th += '     <th style="width: 40%" class="border-top-0 text-center">ชื่อลูกค้า</th>';
                              th += '     <th style="width: 10%" class="border-top-0 text-center">เลขตู้จัดสินค้า</th>';
                                   {{-- <th class="border-top-0 text-center">สถานะตู้</th> --}}
                                   {{-- <th class="border-top-0 text-center">จำนวนสินค้าสั่งจอง</th> --}}
                              th += '     <th style="width: 10%" class="border-top-0 text-center">จำนวนสินค้า<br/>แบ่งให้</th>';
                              th += '</tr>';
                              $("#simpletable2 tbody").append(th);

                              let cnt_str = (data.CustName.length);
                              let customer_name = data.CustName.slice(0, cnt_str/2);
                              let customer_name2 = data.CustName.slice((cnt_str/2)+1, cnt_str);

                              tr += '<tr>';
                              tr += '<td class="text-center">'+i+'</td>';
                              tr += '<td class="text-center">';
                              tr += data.DocuNO;
                              tr += '<input type="hidden" name="DocuNO" value="'+data.DocuNO+'"/>';
                              tr += '</td>';
                              tr += '<td class="text-center">'+(data.RefSOCONo)+'</td>';
                              tr += '<td class="text-center">'+(data.RefSOCODate)+'</td>';
                              tr += '<td class="text-left">'+customer_name+'<br/>'+customer_name2+'</td>';
                              tr += '<td class="text-center">'+data.ContainerNO+'</td>';
                              // tr += '<td>'+data.Flag_st+'</td>';
                              // tr += '<td>'+data.TranQty+'</td>';
                              tr += '<td class="text-center">'+data.SplitQty+'</td>';
                              tr += '</tr>';

                              sum = sum + parseInt(data.SplitQty);
                              i++;
                         });

                         tf += '<tr>';
                         tf += '<td colspan="6" class="text-right">รวม</td>';
                         tf += '<td class="text-center">'+sum+'</td>';
                         tf += '</tr>';
                         $("#simpletable2 tfoot").append(tf);
                    }
                    $("#simpletable2 tbody").append(tr);

                    if (rec.header.AppvStatus == 'N'){
                         let btn = '';
                         btn += '<button class="btn btn-success text-white" name="AppvStatus" value="Y">';
                         btn += '<i class="fas fa-check-circle bigger-120"></i> Approve';
                         btn += '</button>';
                         btn += '<button class="btn btn-danger text-white" name="AppvStatus" value="C">';
                         btn += '<i class="fas fa-trash bigger-120"></i> Cancel';
                         btn += '</button>';
                         $(".modal-footer").html(btn);
                    } else {
                         $(".modal-footer").html("");
                    }
               }
               $(".preloader").css("display", "none");
          }).fail(function(){
               $(".preloader").css("display", "none");
               swal("", rec.content, "error");
          });
     });

     $('#FormEdit').validate({
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
              $.ajax({
                   method : "POST",
                   url : '{{ route('godsplit.updateAppvStatus') }}',
                   dataType : 'json',
                   data : $("#FormEdit").serialize(),
                   headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                   },
                   beforeSend: function() {
                        $(".preloader").css("display", "block");
                   },
              }).done(function(rec){
                   $(".preloader").css("display", "none");
                   var html = '';
                   var html2 = '';
                   var html3 = '';
                   if (rec.status == 1) {
                        swal("", rec.content, "success");
                        $("#ModalEdit").modal('hide');
                        // location.reload();
                        //  $("#simpletable tbody").empty();
                        //  $("#simpletable").dataTable().fnClearTable();
                        //  $("#simpletable").dataTable().fnDraw();
                        //  $("#simpletable").dataTable().fnDestroy();
                        //  let tr = '';
                        // if (rec.details.length > 0){
                        //      var i = 1;
                        //      let flag = '';
                        //      let badge = '';
                        //      let btn_group = '';
                        //      let btn_group2 = '';
                        //      $.each(rec.details, function( key, data ) {
                        //           if (data.AppvStatus == 'N') {
                        //                badge += '<span class="badge badge-warning" title="รออนุมัติ">รออนุมัติ</span>';
                        //           }else if(data.AppvStatus == 'Y'){
                        //                badge += '<span class="badge badge-success" title="Approve"><i class="fas fa-check-circle f-18 analytic-icon"></i></span>';
                        //           }else if(data.AppvStatus == 'C'){
                        //                badge += '<span class="badge badge-danger" title="Not Approve"><i class="fas fa-window-close f-18 analytic-icon"></i></span>';
                        //           }
                        //           if (data.AppvSplitStatus == 'N') {
                        //                btn_group += '<span class="badge badge-warning" title="รออนุมัติ">รออนุมัติ</span>';
                        //           }else if(data.AppvSplitStatus == 'Y'){
                        //                btn_group += '<span class="badge badge-success" title="Approve"><i class="fas fa-check-circle f-18 analytic-icon"></i></span>';
                        //           }else if(data.AppvSplitStatus == 'R'){
                        //                btn_group += '<span class="badge badge-danger" title="Reject"><i class="fas fa-window-close f-18 analytic-icon"></i></span>';
                        //           }
                        //           btn_group2 += '<div class="btn-group btn-group-sm">';
                        //           if(data.AppvStatus == 'N'){
                        //                btn_group2 += '<button class="btn btn-warning btn-edit text-white" data-value="'+data.DocuNO+'" data-toggle="modal" data-target="#ModalEdit">';
                        //                btn_group2 += '<i class="ace-icon feather icon-edit-1 bigger-120"></i>';
                        //                btn_group2 += '</button>';
                        //           } else {
                        //                btn_group2 += '<button class="btn btn-primary btn-edit text-white" data-value="'+data.DocuNO+'" data-toggle="modal" data-target="#ModalEdit">';
                        //                btn_group2 += '<i class="fas fa-eye bigger-120"></i>';
                        //                btn_group2 += '</button>';
                        //           }
                        //           btn_group2 += '</div>';
                        //           // tr += '<tr>';
                        //           // tr += '<td>'+i+'</td>';
                        //           // tr += '<td>'+data.DocuNO+'</td>';
                        //           // tr += '<td>'+data.RefSOCONo+'</td>';
                        //           // tr += '<td>'+(data.DocuDate)+'</td>';
                        //           // tr += '<td>'+(data.ShipDate)+'</td>';
                        //           // tr += '<td>'+data.CustCode+'</td>';
                        //           // tr += '<td>'+data.EmpCode+'</td>';
                        //           // tr += '<td>'+data.GoodCode+'</td>';
                        //           // tr += '<td>';
                        //           // if (data.AppvStatus == 'N') {
                        //           //      tr += '<span class="badge badge-warning" title="รออนุมัติ">รออนุมัติ</span>';
                        //           // }else if(data.AppvStatus == 'Y'){
                        //           //      tr += '<span class="badge badge-success" title="Approve"><i class="fas fa-check-circle f-18 analytic-icon"></i></span>';
                        //           // }else if(data.AppvStatus == 'C'){
                        //           //      tr += '<span class="badge badge-danger" title="Not Approve"><i class="fas fa-window-close f-18 analytic-icon"></i></span>';
                        //           // }
                        //           // tr += '</td>';
                        //           // tr += '<td>';
                        //           // if (data.AppvSplitStatus == 'N') {
                        //           //      tr += '<span class="badge badge-warning" title="รออนุมัติ">รออนุมัติ</span>';
                        //           // }else if(data.AppvSplitStatus == 'Y'){
                        //           //      tr += '<span class="badge badge-success" title="Approve"><i class="fas fa-check-circle f-18 analytic-icon"></i></span>';
                        //           // }else if(data.AppvSplitStatus == 'R'){
                        //           //      tr += '<span class="badge badge-danger" title="Reject"><i class="fas fa-window-close f-18 analytic-icon"></i></span>';
                        //           // }
                        //           // tr += '</td>';
                        //           // tr += '<td class="text-center">';
                        //           // tr += '<div class="btn-group btn-group-sm">';
                        //           // if(data.AppvStatus = 'N'){
                        //           //      tr += '<button class="btn btn-warning btn-edit text-white" data-value="'+data.DocuNO+'" data-toggle="modal" data-target="#ModalEdit">';
                        //           //      tr += '<i class="ace-icon feather icon-edit-1 bigger-120"></i>';
                        //           //      tr += '</button>';
                        //           // } else {
                        //           //      tr += '<button class="btn btn-primary btn-edit text-white" data-value="'+data.DocuNO+'" data-toggle="modal" data-target="#ModalEdit">';
                        //           //      tr += '<i class="fas fa-eye bigger-120"></i>';
                        //           //      tr += '</button>';
                        //           // }
                        //           //
                        //           // tr += '</div>';
                        //           // tr += '</td>';
                        //           // tr += '</tr>';
                        //           i++;
                        //           // $("#simpletable").DataTable().row.add([i,data.DocuNO,data.RefSOCONo,data.DocuDate,data.ShipDate,data.CustName,data.EmpName,data.GoodName1,badge,btn_group,btn_group2]).draw();
                        //
                        //           $("#simpletable").DataTable().row.add([i, data.DocuNO, data.RefSOCONo, data.DocuDate, data.ShipDate, data.CustName, data.EmpName, data.GoodName1, badge, btn_group, btn_group2]).draw();
                        //
                        //           badge = '';
                        //           btn_group = '';
                        //           btn_group2 = '';
                        //      });
                        // }
                        $("#action_div_" + rec.DocuNO).empty();
                        html += ' <button id="btn-view-'+rec.DocuNO+'" class="btn btn-primary btn-edit text-white" data-value="'+rec.DocuNO+'" data-toggle="modal" data-target="#ModalEdit">';
                        html += '<i class="fas fa-eye bigger-120"></i>';
                        html += '</button>';
                        $("#action_div_" + rec.DocuNO).html(html);

                        $("#wait_approve_div_" + rec.DocuNO).empty();
                        html3 += '<span class="badge badge-success" title="Approve">';
                        html3 += '<i class="fas fa-check-circle f-18 analytic-icon"></i>';
                        html3 += '</span>';
                        $("#wait_approve_div_" + rec.DocuNO).html(html3);
                   }else if (rec.status == 2) {
                        swal("", rec.content, "success");
                        $("#ModalEdit").modal('hide');
                        $("#action_div_" + rec.DocuNO).empty();
                        html += ' <button id="btn-view-'+rec.DocuNO+'" class="btn btn-primary btn-edit text-white" data-value="'+rec.DocuNO+'" data-toggle="modal" data-target="#ModalEdit">';
                        html += '<i class="fas fa-eye bigger-120"></i>';
                        html += '</button>';
                        $("#action_div_" + rec.DocuNO).html(html);

                        $("#approve_div_" + rec.DocuNO).empty();
                        html2 += '<span class="badge badge-danger" title="Reject">';
                        html2 += '<i class="fas fa-window-close f-18 analytic-icon"></i>';
                        html2 += '</span>';
                        $("#approve_div_" + rec.DocuNO).html(html2);

                        $("#wait_approve_div_" + rec.DocuNO).empty();
                        html3 += '  <span class="badge badge-danger" title="Not Approve">';
                        html3 += ' <i class="fas fa-window-close f-18 analytic-icon"></i>';
                        html3 += '</span>';
                        $("#wait_approve_div_" + rec.DocuNO).html(html3);
                   } else {
                        swal("", rec.content, "warning");
                   }
                   $('#simpletable').DataTable();
              }).fail(function(){
                   // btn.button("reset");
              });
         },
         invalidHandler: function (form) {

         }
     });

     $(function() {
          $('body').on('click', '.btn-test', function (e) {
               e.preventDefault();
               $.ajax({
                    method : "POST",
                    url : '{{ route('godsplit.test') }}',
                    dataType : 'json',
                    data : $("#FormEdit").serialize(),
                    headers: {
                         'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    beforeSend: function() {
                         $(".preloader").css("display", "block");
                         $(".btn-success").attr("disabled", true);
                    },
               }).done(function(rec){
                    $(".preloader").css("display", "none");
                    location.reload();
                    // $("#simpletable tbody").empty();
                    // $("#ModalEdit").modal('hide');
                    // $("#simpletable tbody").empty();
                    // $("#simpletable").dataTable().fnClearTable();
                    // $("#simpletable").dataTable().fnDraw();
                    // $("#simpletable").dataTable().fnDestroy();
                    // let tr = '';
                    // var i = 0;
                    // let flag = '';
                    // let badge = '';
                    // let btn_group = '';
                    // let btn_group2 = '';
                    // $.each(rec.details, function( key, data ) {
                    //      if (data.AppvStatus == 'N') {
                    //           badge += '<span class="badge badge-warning" title="รออนุมัติ">รออนุมัติ</span>';
                    //      }else if(data.AppvStatus == 'Y'){
                    //           badge += '<span class="badge badge-success" title="Approve"><i class="fas fa-check-circle f-18 analytic-icon"></i></span>';
                    //      }else if(data.AppvStatus == 'C'){
                    //           badge += '<span class="badge badge-danger" title="Not Approve"><i class="fas fa-window-close f-18 analytic-icon"></i></span>';
                    //      }
                    //      if (data.AppvSplitStatus == 'N') {
                    //           btn_group += '<span class="badge badge-warning" title="รออนุมัติ">รออนุมัติ</span>';
                    //      }else if(data.AppvSplitStatus == 'Y'){
                    //           btn_group += '<span class="badge badge-success" title="Approve"><i class="fas fa-check-circle f-18 analytic-icon"></i></span>';
                    //      }else if(data.AppvSplitStatus == 'R'){
                    //           btn_group += '<span class="badge badge-danger" title="Reject"><i class="fas fa-window-close f-18 analytic-icon"></i></span>';
                    //      }
                    //      btn_group2 += '<div class="btn-group btn-group-sm">';
                    //      if(data.AppvStatus == 'N'){
                    //           btn_group2 += '<button class="btn btn-warning btn-edit text-white" data-value="'+data.DocuNO+'" data-toggle="modal" data-target="#ModalEdit">';
                    //           btn_group2 += '<i class="ace-icon feather icon-edit-1 bigger-120"></i>';
                    //           btn_group2 += '</button>';
                    //      } else {
                    //           btn_group2 += '<button class="btn btn-primary btn-edit text-white" data-value="'+data.DocuNO+'" data-toggle="modal" data-target="#ModalEdit">';
                    //           btn_group2 += '<i class="fas fa-eye bigger-120"></i>';
                    //           btn_group2 += '</button>';
                    //      }
                    //      btn_group2 += '</div>';
                    //
                    //      i++;
                    //      $("#simpletable").DataTable().row.add([i, data.DocuNO, data.RefSOCONo, data.DocuDate, data.ShipDate, data.CustName, data.EmpName, data.GoodName1, badge, btn_group, btn_group2]).draw();
                    //      // $("#simpletable").DataTable().row.add([i, data.DocuNO, data.RefSOCONo, data.DocuDate, data.ShipDate, data.CustName, data.EmpName, data.GoodName1, badge, btn_group, btn_group2]).draw();
                    //      badge = '';
                    //      btn_group = '';
                    //      btn_group2 = '';
                    // });

               }).fail(function(){
                    $(".preloader").css("display", "none");
                    swal("", "ไม่สำเร็จ", "warning");
               });
          });
     });


     </script>

</body>

</html>
