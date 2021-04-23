@extends('layouts.layout')
<link rel="stylesheet" href="{{asset('assets/css/plugins/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/plugins/daterangepicker.css')}}">
@section('css_bottom')
@endsection
@section('body')
     <div class="pcoded-inner-content">
          <div class="main-body">
               <div class="page-wrapper">
                    <!-- [ breadcrumb ] start -->
                   <div class="page-header">
                       <div class="page-block">
                           <div class="row align-items-center">
                              <div class="col-md-12">
                                   <div class="page-header-title">
                                       <h5 class="m-b-10">{{$titie}}</h5>
                                   </div>
                                   <ul class="breadcrumb">
                                       <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="feather icon-home"></i></a></li>
                                       <li class="breadcrumb-item"><a href="{{route('user')}}">สมาชิกทั้งหมด</a></li>
                                       <li class="breadcrumb-item">{{$titie}}</li>
                                   </ul>
                              </div>
                           </div>
                       </div>
                   </div>
                   <!-- [ breadcrumb ] end -->
                    <div class="row">
                         <div class="col-lg-12">
                              <div class="card">
                                  <div class="card-body">
                                       <form id="FormAdd">
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
                                            <div class="form-row">
                                                 <div class="col-xl-12">
                                                      <div class="card">
                                                           {{-- <div class="card-header">
                                                                <h5>Striped Table</h5>
                                                                <span class="d-block m-t-5">use class <code>table-striped</code> inside table element</span>
                                                           </div> --}}
                                                           <div class="card-body table-border-style">
                                                                <div class="table-responsive">
                                                                     <table class="table table-striped">
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
                                                                               @for ($i=0; $i < 5; $i++)
                                                                                    <tr>
                                                                                         <td><input type="checkbox" class="form-check" value=""></td>
                                                                                         <td>SO-CO2104-0001</td>
                                                                                         <td>01/04/2021</td>
                                                                                         <td>23</td>
                                                                                         <td>45/2068 หมู่ 1 หนองค้างพลู หนองแขม กรุงเทพ</td>
                                                                                         <td>990.99</td>
                                                                                         <td>100</td>
                                                                                         <td>20</td>
                                                                                    </tr>
                                                                               @endfor
                                                                          </tbody>
                                                                     </table>
                                                                </div>
                                                           </div>
                                                      </div>
                                                 </div>
                                            </div>
                                            <h5>แบ่งสินค้ามาจาก</h5>
                                            <hr/>
                                            <div class="form-row">
                                                 <div class="col-md-12 mb-3">
                                                      <label for="sale_code_from">รหัสพนักงานขาย</label>
                                                      <input type="text" class="form-control" name="sale_code_from" placeholder="" value="" required>
                                                 </div>
                                            </div>
                                            <div class="form-row">
                                                 <div class="col-xl-12">
                                                      <div class="card">
                                                           {{-- <div class="card-header">
                                                                <h5>Striped Table</h5>
                                                                <span class="d-block m-t-5">use class <code>table-striped</code> inside table element</span>
                                                           </div> --}}
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
                                            <button type="submit" class="btn btn-primary">บันทึก</button>
                                       </form>
                                  </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
@endsection
@section('js_bottom')
     <!-- jquery-validation Js -->
     <script src="{{asset('assets/js/plugins/jquery.validate.min.js')}}"></script>
     <!-- sweet alert Js -->
     <script src="{{asset('assets/js/plugins/sweetalert.min.js')}}"></script>
     <!-- datepicker js -->
     <script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
     <script src="{{asset('assets/js/plugins/daterangepicker.js')}}"></script>
     <script type="text/javascript">
         $(document).ready(function() {
            $("#pcoded").pcodedmenu({
                 themelayout: 'horizontal',
                 MenuTrigger: 'hover',
                 SubMenuTrigger: 'hover',
            });
         });

         $(function() {
              $('input[name="document_date"]').daterangepicker({
                   singleDatePicker: true,
                   showDropdowns: true,
                   minYear: 2020,
                   maxYear: parseInt(moment().format('YYYY'),10),
                   locale: {
                      format: 'DD MMM YYYY'
                  }
              });
              $('input[name="send_appointment"]').daterangepicker({
                   singleDatePicker: true,
                   showDropdowns: true,
                   minYear: 2020,
                   maxYear: parseInt(moment().format('YYYY'),10),
                   locale: {
                      format: 'DD MMM YYYY'
                  }
              });
         });

         $('#FormAdd').validate({
              ignore: '.ignore, .select2-input',
              focusInvalid: false,
              rules: {
                   // 'email' : {
                   //      required: true,
                   //    email: true
                   // },
              },
              // Errors //
              errorPlacement: function errorPlacement(error, element) {
                   var $parent = $(element).parents('.form-group');
                   // Do not duplicate errors
                   if ($parent.find('.jquery-validation-error').length) {
                        return;
                   }
                   $parent.append(
                        error.addClass('jquery-validation-error small form-text invalid-feedback')
                   );
              },
              highlight: function(element) {
                   var $el = $(element);
                   var $parent = $el.parents('.form-group');

                   $el.addClass('is-invalid');

                   // Select2 and Tagsinput
                   if ($el.hasClass('select2-hidden-accessible') || $el.attr('data-role') === 'tagsinput') {
                        $el.parent().addClass('is-invalid');
                   }
              },
              unhighlight: function(element) {
                   $(element).parents('.form-group').find('.is-invalid').removeClass('is-invalid');
              },
              submitHandler: function (form) {
                   var btn = $("#FormAdd").find('[type="submit"]');
                   btn.button("loading");
                   var form = $('#FormAdd')[0];
                   var formData = new FormData(form);
                   $.ajax({
                        method : "POST",
                        url : '{{ route('user.store') }}',
                        dataType : 'json',
                        data : formData,
                        processData: false,
                        contentType: false,
                   }).done(function(rec){
                        btn.button("reset");
                        if (rec.status == 1) {
                             swal("", rec.content, "success").then(function(){
                                  window.location.href = "{{ route('user') }}";
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
@endsection
