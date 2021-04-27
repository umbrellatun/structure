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
     <!-- Modal Edit -->
     <div class="modal fade bd-example-modal-lg" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
               <div class="modal-content">
                    <form id="FormEdit">
                         <div class="modal-header">
                              <h5 class="modal-title h4" id="myLargeModalLabel">รายละเอียด</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         </div>
                         <div class="modal-body">
                                   <div class="dt-responsive table-responsive">
                                        <table id="simpletable2" class="table table-striped table-bordered nowrap">
                                             <thead>
                                                  <tr>
                                                       <th class="border-top-0 text-center">No</th>
                                                       <th class="border-top-0 text-center">เลขที่เอกสาร</th>
                                                       <th class="border-top-0 text-center">วันที่จอง</th>
                                                       <th class="border-top-0 text-center">ชื่อลูกค้า</th>
                                                       <th class="border-top-0 text-center">เลขตู้จัดสินค้า</th>
                                                       <th class="border-top-0 text-center">สถานะตู้</th>
                                                       <th class="border-top-0 text-center">จำนวนสินค้าสั่งจอง</th>
                                                       <th class="border-top-0 text-center">จำนวนสินค้าแบ่งให้</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                             </tbody>
                                        </table>
                                   </div>
                         </div>
                         <div class="modal-footer">
                              <button class="btn btn-success text-white" data-value="" data-toggle="modal" data-target="#ModalEdit">
                                   <i class="fas fa-check-circle bigger-120"></i> Approve
                              </button>
                              <button class="btn btn-danger text-white" data-value="" data-toggle="modal" data-target="#ModalEdit">
                                   <i class="fas fa-trash bigger-120"></i> Cancel
                              </button>
                         </div>
                    </form>
               </div>
          </div>
     </div>


     <!-- end Modal edit -->
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
                                                            <th class="border-top-0 text-center">No</th>
                                                            <th class="border-top-0 text-center">เลขที่เอกสาร</th>
                                                            <th class="border-top-0 text-center">วันที่เอกสาร</th>
                                                            <th class="border-top-0 text-center">วันที่นัดส่ง</th>
                                                            <th class="border-top-0 text-center">รหัสลูกค้า</th>
                                                            <th class="border-top-0 text-center">รหัสพนักงานขาย</th>
                                                            <th class="border-top-0 text-center">รหัสสินค้า</th>
                                                            <th class="border-top-0 text-center">action</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @php $i=1; @endphp
                                                       @foreach ($headers as $key => $header)
                                                            <tr>
                                                                 <td>{{$i}}</td>
                                                                 <td>{{$header->DocuNO}}</td>
                                                                 <td>{{$header->DocuDate}}</td>
                                                                 <td>{{$header->ShipDate}}</td>
                                                                 <td>{{$header->CustCode}}</td>
                                                                 <td>{{$header->EmpCode}}</td>
                                                                 <td>{{$header->GoodCode}}</td>
                                                                 <td class="text-center">
                                                                      <div class="btn-group btn-group-sm">
                                                                           <button class="btn btn-warning btn-edit text-white" data-value="{{$header->DocuNO}}" data-toggle="modal" data-target="#ModalEdit">
                                                                                <i class="ace-icon feather icon-edit-1 bigger-120"></i>
                                                                           </button>
                                                                      </div>
                                                                 </td>
                                                            </tr>
                                                            @php $i++; @endphp
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
     <script type="text/javascript">
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
                    $("#preloaders").css("display", "block");
               },
          }).done(function(rec){
               if (rec.status == 1){
                    let tr = '';
                    if (rec.details.length > 0){
                         var i = 1;
                         let flag = '';
                         $.each(rec.details, function( key, data ) {
                              tr += '<tr>';
                              tr += '<td>'+i+'</td>';
                              tr += '<td>';
                              tr += data.DocuNO;
                              tr += '<input type="hidden" name="DocuNO" value="'+data.DocuNO+'"/>';
                              tr += '</td>';
                              tr += '<td>'+formatDate(data.RefSOCODate)+'</td>';
                              tr += '<td>'+data.EmpName+'</td>';
                              tr += '<td>'+data.ContainerNO+'</td>';
                              tr += '<td>'+data.Flag_st+'</td>';
                              tr += '<td>'+data.TranQty+'</td>';
                              tr += '<td>'+data.SplitQty+'</td>';
                              tr += '</tr>';
                              i++;
                         });
                    }
                    $("#simpletable2 tbody").append(tr);
               }
               $("#preloaders").css("display", "none");
          }).fail(function(){
               $("#preloaders").css("display", "none");
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
            var btn = $("#FormEdit").find('[type="submit"]');
            btn.button("loading");
            $.ajax({
                 method : "POST",
                 url : '{{ route('godsplit') }}',
                 dataType : 'json',
                 data : $("#FormEdit").serialize(),
                 headers: {
                      'X-CSRF-TOKEN': "{{ csrf_token() }}"
                 }
            }).done(function(rec){
                  btn.button("reset");
                  if (rec.status == 1) {
                       swal("", rec.content, "success").then(function(){
                            window.location.href = "{{ route('menu') }}";
                       });
                  } else {
                       swal("", rec.content, "warning");
                  }
            }).fail(function(){
                  btn.button("reset");
            });
         },
         invalidHandler: function (form) {

         }
     });
     </script>

</body>

</html>
