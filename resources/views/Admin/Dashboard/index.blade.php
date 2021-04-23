@extends('layouts.layout')
@section('css_bottom')
@endsection
@section('body')
     <div class="row">
         <div class="col-sm-12">
             <div class="card">
                 <div class="card-header">
                    <h5>Dark layout</h5>
                 </div>
                 <div class="card-body">
                      <div class="row">
                           <div class="col-md-6 col-xl-3">
                                <div class="card bg-c-blue order-card">
                                     <div class="card-body">
                                          <h6 class="text-white">รายการสั่งซื้อ</h6>
                                          <h2 class="text-right text-white"><i class="feather icon-shopping-cart float-left"></i><span>125</span></h2>
                                          <p class="m-b-0">Completed Orders<span class="float-right">351</span></p>
                                     </div>
                                </div>
                           </div>
                      </div>
                 </div>
             </div>
         </div>
     </div>
@endsection
