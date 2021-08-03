<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\ICGodSplitHD;
use App\Models\ICGodSplitDT;

class GodSplitController extends Controller
{

     public function index(Request $request)
     {
          $data["title"] = "อนุมัติคำขอแบ่งสินค้า";
          if ($request->daterange) {
               $daterange = $request->daterange;
               $str_date = explode('-', $daterange);
               $start_date = explode('/', trim($str_date[0]));
               $start_date = $start_date[2] . $start_date[1] . $start_date[0];
               $end_date = explode('/', trim($str_date[1]));
               $end_date = $end_date[2] . $end_date[1] . $end_date[0];

               $data["daterange"] = date_format(date_create($start_date), "m/d/Y") . ' - ' . date_format(date_create($end_date), "m/d/Y");
               $data["headers"] = ICGodSplitHD::where(function($q)use($start_date, $end_date){
                    $q->whereRaw("CONVERT(Varchar, [DocuDate], 112) BETWEEN '".$start_date."' AND '".$end_date."'");
               })
               ->orderByRaw("ISNULL(AppvStatus, ''), AppvStatus ASC")->get();
          } else {
               // $data["headers"] = ICGodSplitHD::orderBy('DocuNO', 'desc')->get();
               // $data["headers"] = ICGodSplitHD::orderBy('AppvStatus', 'asc')->get();
               if($request->daterange == null){
                    $today = date("Y-m-d");
                    $previous_day = date('Y-m-d',strtotime($today . "-15 days"));
                    $data["daterange"] = date_format(date_create($previous_day), "m/d/Y") . ' - ' . date_format(date_create($today), "m/d/Y");
                    $data["headers"] = ICGodSplitHD::where(function($q)use($previous_day, $today){
                         $q->whereRaw("CONVERT(Varchar, [DocuDate], 112) BETWEEN '".$previous_day."' AND '".$today."'");
                    })
                    ->orderByRaw("ISNULL(AppvStatus, ''), AppvStatus ASC")->get();
               }
          }
          return view('godsplitlist', $data);
     }

     public function get_detail(Request $request)
     {
          $DocuNO = $request->DocuNO;
          $validator = Validator::make($request->all(), [

          ]);
          if (!$validator->fails()) {
               try {
                    // $details = ICGodSplitDT::where('DocuNO', '=', $DocuNO)->get();
                    $q = "SELECT";
                    $q .= " DocuNO, RefSOCOID, RefListNO, RefSOCONo, CONVERT(VARCHAR, RefSOCODate, 6) RefSOCODate, CustName, EmpCode";
                    $q .= ", EmpName, ContainerNO, Flag_st, TranQty, SplitQty";
                    $q .= " FROM icGodSplit_dt";
                    $q .= " WHERE";
                    $q .= " DocuNO = '$DocuNO'";
                    $header = ICGodSplitHD::where('DocuNO', '=', $DocuNO)->first();

                    $return['status'] = 1;
                    // $return['details'] = $details;
                    $return['details'] = \DB::select($q);
                    $return['header'] = $header;
               } catch (Exception $e) {
                    $return['status'] = 0;
               }
          } else{
               $return['status'] = 0;
          }
          return json_encode($return);
     }

     public function updateAppvStatus(Request $request)
     {
          $AppvStatus = $request->AppvStatus;
          $DocuNO = $request->DocuNO;
          if ($request->daterange_modal){
               $daterange = $request->daterange_modal;
               $str_date = explode('-', $daterange);
               $start_date = explode('/', trim($str_date[0]));
               $start_date = $start_date[2] . $start_date[0] . $start_date[1];
               $end_date = explode('/', trim($str_date[1]));
               $end_date = $end_date[2] . $end_date[0] . $end_date[1];
          } else {
               $start_date = date('Y-m-d',strtotime($today . "-15 days"));
               $end_date = date("Y-m-d");
          }
          $validator = Validator::make($request->all(), [

          ]);
          if (!$validator->fails()) {
               // \DB::beginTransaction();
               try {
                    if ($AppvStatus == 'Y') {
                         $q = "SELECT Flag_st FROM";
                         $q .= " (";
                         $q .= " SELECT Flag_st FROM tmConTain_bk WHERE ContainerNO IN";
                         $q .= " (SELECT ContainerNO FROM icGodSplit_dt WHERE icGodSplit_dt.DocuNO = '$DocuNO')";
                         $q .= " UNION ALL";
                         $q .= " SELECT Flag_st FROM tmConTain_dl WHERE ContainerNO IN";
                         $q .= " (SELECT ContainerNO FROM icGodSplit_dt WHERE icGodSplit_dt.DocuNO = '$DocuNO')";
                         $q .= " UNION ALL";
                         $q .= " SELECT Flag_st FROM tmConTain WHERE ContainerNO IN";
                         $q .= " (SELECT ContainerNO FROM icGodSplit_dt WHERE icGodSplit_dt.DocuNO = '$DocuNO')";
                         $q .= " ) tmConTain";
                         $q .= " WHERE";
                         $q .= " Flag_st <> 'N'";
                         $check_flag = \DB::select($q);
                         if (count($check_flag) > 0){
                              $return['status'] = 0;
                              $return['title'] = 'ไม่สามารถดำเนินการแบ่งสินค้าได้';
                              $return['content'] = 'เนื่องจากสถานะตู้ปิดแล้ว กรุณาตรวจสอบ...';
                         } else {
                              // $data = [
                              //      'AppvStatus' => $AppvStatus
                              // ];
                              // ICGodSplitHD::where('DocuNO', '=', $DocuNO)->update($data);
                              // \DB::commit();
                              $return['status'] = 1;
                              $return['content'] = 'อนุมัติสำเร็จ';
                         }
                    } else {
                         // $data = [
                         //      'AppvStatus' => $AppvStatus
                         // ];
                         // ICGodSplitHD::where('DocuNO', '=', $DocuNO)->update($data);
                         // \DB::commit();
                         $return['status'] = 1;
                         $return['content'] = 'ไม่อนุมัติสำเร็จ';
                    }
                    // $details = ICGodSplitHD::orderBy('DocuNO', 'desc')->get();
                    $q = "SELECT";
                    $q .= " DocuNO";
                    $q .= ", RefSOCONo";
                    $q .= ", CONVERT(VARCHAR, DocuDate, 6) DocuDate";
                    $q .= ", CONVERT(VARCHAR, ShipDate, 6) ShipDate";
                    $q .= ", CustCode";
                    $q .= ", CustName";
                    $q .= ", EmpCode";
                    $q .= ", EmpName";
                    $q .= ", GoodCode";
                    $q .= ", GoodName1";
                    $q .= ", AppvStatus";
                    $q .= ", AppvSplitStatus";
                    $q .= " FROM icGodSplit_hd";
                    $q .= " WHERE (CONVERT(Varchar, [DocuDate], 112) BETWEEN $start_date AND $end_date)";
                    $q .= " ORDER BY ISNULL(AppvStatus, ''), AppvStatus ASC";
                    // $q .= " ORDER BY AppvSplitStatus asc";
                    $return['details'] = \DB::select($q);
                    // $return['details'] = $details;
               } catch (Exception $e) {
                    \DB::rollBack();
                    $return['status'] = 0;
                    $return['content'] = 'ไม่สำเร็จ'.$e->getMessage();
               }
          } else{
               \DB::rollBack();
               $return['status'] = 0;
          }
          return json_encode($return);
     }

     public function test($value='')
     {
          $q = "SELECT";
          $q .= " DocuNO";
          $q .= ", RefSOCONo";
          $q .= ", CONVERT(VARCHAR, DocuDate, 6) DocuDate";
          $q .= ", CONVERT(VARCHAR, ShipDate, 6) ShipDate";
          $q .= ", CustCode";
          $q .= ", CustName";
          $q .= ", EmpCode";
          $q .= ", EmpName";
          $q .= ", GoodCode";
          $q .= ", GoodName1";
          $q .= ", AppvStatus";
          $q .= ", AppvSplitStatus";
          $q .= " FROM icGodSplit_hd";
          // $q .= " ORDER BY AppvSplitStatus asc";
          $q .= " ORDER BY ISNULL(AppvStatus, ''), AppvStatus ASC";
          $return['details'] = \DB::select($q);
          return json_encode($return);
     }
}
