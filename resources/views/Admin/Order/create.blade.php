@extends('layouts.layout')
<link rel="stylesheet" href="{{asset('assets/css/plugins/dataTables.bootstrap4.min.css')}}">
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
                                                 <div class="col-md-4 mb-3">
                                                      <label for="validationTooltip01">เลขที่เอกสาร</label>
                                                      <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" value="Mark" required>
                                                      <div class="valid-tooltip">
                                                           Looks good!
                                                      </div>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                      <label for="validationTooltip02">วันที่เอกสาร</label>
                                                      <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" value="Otto" required>
                                                      <div class="valid-tooltip">
                                                           Looks good!
                                                      </div>
                                                 </div>
                                                 <div class="col-md-4 mb-3">
                                                      <label for="validationTooltip02">วันที่เอกสาร</label>
                                                      <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" value="Otto" required>
                                                      <div class="valid-tooltip">
                                                           Looks good!
                                                      </div>
                                                 </div>
                                            </div>
                                            <div class="form-row">
                                                 <div class="col-md-6 mb-3">
                                                      <label for="validationTooltip03">City</label>
                                                      <input type="text" class="form-control" id="validationTooltip03" placeholder="City" required>
                                                      <div class="invalid-tooltip">
                                                           Please provide a valid city.
                                                      </div>
                                                 </div>
                                                 <div class="col-md-3 mb-3">
                                                      <label for="validationTooltip04">State</label>
                                                      <input type="text" class="form-control" id="validationTooltip04" placeholder="State" required>
                                                      <div class="invalid-tooltip">
                                                           Please provide a valid state.
                                                      </div>
                                                 </div>
                                                 <div class="col-md-3 mb-3">
                                                      <label for="validationTooltip05">Zip</label>
                                                      <input type="text" class="form-control" id="validationTooltip05" placeholder="Zip" required>
                                                      <div class="invalid-tooltip">
                                                           Please provide a valid zip.
                                                      </div>
                                                 </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
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

     <script type="text/javascript">
         $(document).ready(function() {
            $("#pcoded").pcodedmenu({
                 themelayout: 'horizontal',
                 MenuTrigger: 'hover',
                 SubMenuTrigger: 'hover',
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
