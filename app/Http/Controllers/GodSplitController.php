<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\ICGodSplitHD;
use App\Models\ICGodSplitDT;

class GodSplitController extends Controller
{

     public function index()
     {
          $data["title"] = "อนุมัติคำขอแบ่งสินค้า";
          // $data["headers"] = ICGodSplitHD::orderBy('DocuNO', 'desc')->get();
          // $data["headers"] = ICGodSplitHD::orderBy('AppvStatus', 'asc')->get();
          $data["headers"] = ICGodSplitHD::orderByRaw("ISNULL(AppvStatus, ''), AppvStatus ASC")->get();
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
          $validator = Validator::make($request->all(), [

          ]);
          if (!$validator->fails()) {
               \DB::beginTransaction();
               try {
                    $data = [
                         'AppvStatus' => $AppvStatus
                    ];
                    ICGodSplitHD::where('DocuNO', '=', $DocuNO)->update($data);
                    \DB::commit();

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
                    $q .= " ORDER BY ISNULL(AppvStatus, ''), AppvStatus ASC";
                    // $q .= " ORDER BY AppvSplitStatus asc";
                    $return['details'] = \DB::select($q);
                    // $return['details'] = $details;
                    $return['status'] = 1;
                    $return['content'] = 'จัดเก็บสำเร็จ';
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
