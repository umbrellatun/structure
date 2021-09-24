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
          // dd($request->all());
          $data["title"] = "อนุมัติคำขอแบ่งสินค้า";
          if ($request->daterange) {
               $daterange = $request->daterange;
               $docuno = $request->docuno;
               $str_date = explode('-', $daterange);
               $start_date = self::ConvertDate($str_date[0]);
               $end_date = self::ConvertDate($str_date[1]);

               $data["daterange"] = date_format(date_create($start_date), "d M Y") . ' - ' . date_format(date_create($end_date), "d M Y");
               $headers = ICGodSplitHD::where(function($q)use($start_date, $end_date){
                    $q->whereRaw("CONVERT(Varchar, [DocuDate], 112) BETWEEN '".$start_date."' AND '".$end_date."'");
               })
               ->where('DocuNO', 'like', '%'.$docuno.'%')
               // ->orderByRaw("ISNULL(AppvStatus, ''), AppvStatus ASC");
               ->orderByRaw(
                    "CASE
                         WHEN AppvStatus = 'N' THEN 1
                         WHEN AppvStatus = 'Y' THEN 2
                         WHEN AppvStatus = 'C' THEN 3 END ASC"
               );
          } else {
               // $data["headers"] = ICGodSplitHD::orderBy('DocuNO', 'desc')->get();
               // $data["headers"] = ICGodSplitHD::orderBy('AppvStatus', 'asc')->get();
               if($request->daterange == null){
                    $today = date("Ymd");
                    $previous_day = date('Ymd',strtotime($today . "-15 days"));
                    $data["daterange"] = date_format(date_create($previous_day), "d M Y") . ' - ' . date_format(date_create($today), "d M Y");
                    $headers = ICGodSplitHD::where(function($q)use($previous_day, $today){
                         $q->whereRaw("CONVERT(Varchar, [DocuDate], 112) BETWEEN '".$previous_day."' AND '".$today."'");
                    })
                    // ->orderByRaw("ISNULL(AppvStatus, ''), AppvStatus ASC");
                    // ->orderByRaw("AppvStatus", "N", "Y", "C");
                    ->orderByRaw(
                         "CASE
                              WHEN AppvStatus = 'N' THEN 1
                              WHEN AppvStatus = 'Y' THEN 2
                              WHEN AppvStatus = 'C' THEN 3 END ASC"
                    );
               }
          }
          $data["headers"] = $headers->paginate(10)->appends(request()->query());
          // dd($data["headers"]);
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
               $start_date = self::ConvertDate($str_date[0]);
               $end_date = self::ConvertDate($str_date[1]);
          } else {
               $today = date("Ymd");
               $start_date = date('Ymd',strtotime($today . "-15 days"));
               $end_date = date("Ymd");
          }
          $validator = Validator::make($request->all(), [

          ]);
          if (!$validator->fails()) {
               \DB::beginTransaction();
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
                              $data = [
                                   'AppvStatus' => $AppvStatus
                              ];
                              ICGodSplitHD::where('DocuNO', '=', $DocuNO)->update($data);
                              \DB::commit();
                              $return['status'] = 1;
                              $return['content'] = 'อนุมัติสำเร็จ';
                         }
                    } else {
                         if ($AppvStatus == 'C') {
                              $data = [
                                   'AppvStatus' => $AppvStatus
                                   ,'AppvSplitStatus' => 'R'
                              ];
                         }
                         if ($AppvStatus == 'Y') {
                              $data = [
                                   'AppvStatus' => $AppvStatus
                              ];
                         }
                         ICGodSplitHD::where('DocuNO', '=', $DocuNO)->update($data);
                         \DB::commit();
                         $return['status'] = 2;
                         $return['content'] = 'ไม่อนุมัติสำเร็จ';
                    }
                    // $details = ICGodSplitHD::orderBy('DocuNO', 'desc')->get();
                    // $q = "SELECT";
                    // $q .= " DocuNO";
                    // $q .= ", RefSOCONo";
                    // $q .= ", CONVERT(VARCHAR, DocuDate, 6) DocuDate";
                    // $q .= ", CONVERT(VARCHAR, ShipDate, 6) ShipDate";
                    // $q .= ", CustCode";
                    // $q .= ", CustName";
                    // $q .= ", EmpCode";
                    // $q .= ", EmpName";
                    // $q .= ", GoodCode";
                    // $q .= ", GoodName1";
                    // $q .= ", AppvStatus";
                    // $q .= ", AppvSplitStatus";
                    // $q .= " FROM icGodSplit_hd";
                    // $q .= " WHERE (CONVERT(Varchar, [DocuDate], 112) BETWEEN $start_date AND $end_date)";
                    // $q .= " ORDER BY ISNULL(AppvStatus, ''), AppvStatus ASC";
                    // // $q .= " ORDER BY AppvSplitStatus asc";
                    // $return['details'] = \DB::select($q);
                    // $return['details'] = $details;
                    // $headers = ICGodSplitHD::where(function($q)use($start_date, $end_date){
                    //      $q->whereRaw("CONVERT(Varchar, [DocuDate], 112) BETWEEN '".$start_date."' AND '".$end_date."'");
                    // })
                    // ->orderByRaw("ISNULL(AppvStatus, ''), AppvStatus ASC");
                    // $return["details"] = $headers->paginate(10)->appends(request()->query());
                    $return["DocuNO"] = $DocuNO;
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

     function ConvertDate($daterange){
          try {
               if ($daterange){
                    $start_date = explode(' ', trim($daterange));
                    if($start_date[1] == 'Jan'){
                         $date_use = $start_date[2] . '01' . $start_date[0];
                    }elseif($start_date[1] == 'Feb'){
                         $date_use = $start_date[2] . '02' . $start_date[0];
                    }elseif($start_date[1] == 'Mar'){
                         $date_use = $start_date[2] . '03' . $start_date[0];
                    }elseif($start_date[1] == 'Apr'){
                         $date_use = $start_date[2] . '04' . $start_date[0];
                    }elseif($start_date[1] == 'May'){
                         $date_use = $start_date[2] . '05' . $start_date[0];
                    }elseif($start_date[1] == 'Jun'){
                         $date_use = $start_date[2] . '06' . $start_date[0];
                    }elseif($start_date[1] == 'Jul'){
                         $date_use = $start_date[2] . '07' . $start_date[0];
                    }elseif($start_date[1] == 'Aug'){
                         $date_use = $start_date[2] . '08' . $start_date[0];
                    }elseif($start_date[1] == 'Sep'){
                         $date_use = $start_date[2] . '09' . $start_date[0];
                    }elseif($start_date[1] == 'Oct'){
                         $date_use = $start_date[2] . '10' . $start_date[0];
                    }elseif($start_date[1] == 'Nov'){
                         $date_use = $start_date[2] . '11' . $start_date[0];
                    }elseif($start_date[1] == 'Dec'){
                         $date_use = $start_date[2] . '12' . $start_date[0];
                    }
               }
               return $date_use;
          } catch (\Exception $e) {
               return null;
          }
     }

     public function test(Request $request)
     {
          if ($request->daterange_modal){
               $daterange = $request->daterange_modal;
               $str_date = explode('-', $daterange);
               $start_date = self::ConvertDate($str_date[0]);
               $end_date = self::ConvertDate($str_date[1]);
          } else {
               $today = date("Ymd");
               $start_date = date('Ymd',strtotime($today . "-15 days"));
               $end_date = date("Ymd");
          }
          // $q = "SELECT";
          // $q .= " DocuNO";
          // $q .= ", RefSOCONo";
          // $q .= ", CONVERT(VARCHAR, DocuDate, 6) DocuDate";
          // $q .= ", CONVERT(VARCHAR, ShipDate, 6) ShipDate";
          // $q .= ", CustCode";
          // $q .= ", CustName";
          // $q .= ", EmpCode";
          // $q .= ", EmpName";
          // $q .= ", GoodCode";
          // $q .= ", GoodName1";
          // $q .= ", AppvStatus";
          // $q .= ", AppvSplitStatus";
          // $q .= " FROM icGodSplit_hd";
          // // $q .= " ORDER BY AppvSplitStatus asc";
          // $q .= " WHERE (CONVERT(Varchar, [DocuDate], 112) BETWEEN $start_date AND $end_date)";
          // $q .= " ORDER BY ISNULL(AppvStatus, ''), AppvStatus ASC";
          // $return['details'] = \DB::select($q);

          $headers = ICGodSplitHD::where(function($q)use($start_date, $end_date){
               $q->whereRaw("CONVERT(Varchar, [DocuDate], 112) BETWEEN '".$start_date."' AND '".$end_date."'");
          })
          ->orderByRaw("ISNULL(AppvStatus, ''), AppvStatus ASC");
          $return["details"] = $headers->paginate(10)->appends(request()->query());


          return json_encode($return);
     }
}
