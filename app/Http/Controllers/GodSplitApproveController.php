<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\ICGodSplitHD;
use App\Models\ICGodSplitDT;

class GodSplitApproveController extends Controller
{
     public function index()
     {
          $data["title"] = "ยืนยันแบ่งสินค้า";
          $data["headers"] = ICGodSplitHD::where('AppvStatus', '=', 'Y')->orderBy('DocuNO', 'desc')->get();

          return view('godapprovesplitlist', $data);
     }

     public function get_detail(Request $request)
     {
          $DocuNO = $request->DocuNO;
          $validator = Validator::make($request->all(), [

          ]);
          if (!$validator->fails()) {
               try {
                    // $details = ICGodSplitDT::where('DocuNO', '=', $DocuNO)->get();
                    // $return['details'] = $details;
                    $q = "SELECT";
                    $q .= " DocuNO, RefSOCOID, RefListNO, RefSOCONo, CONVERT(VARCHAR, RefSOCODate, 6) RefSOCODate, CustName, EmpCode";
                    $q .= ", EmpName, ContainerNO, Flag_st, TranQty, SplitQty";
                    $q .= " FROM icGodSplit_dt";
                    $q .= " WHERE";
                    $q .= " DocuNO = '$DocuNO'";
                    $header = ICGodSplitHD::where('DocuNO', '=', $DocuNO)->first();
                    $return['status'] = 1;
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

     public function updateAppvSplitStatus(Request $request)
     {
          $AppvStatus = $request->AppvStatus;
          $DocuNO = $request->DocuNO;
          $validator = Validator::make($request->all(), [

          ]);
          if (!$validator->fails()) {
               try {
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
                              'AppvSplitStatus' => $AppvStatus
                         ];
                         ICGodSplitHD::where('DocuNO', '=', $DocuNO)->update($data);
                         // \DB::commit();

                         $resStore = \DB::connection("sqlsrv109")->statement('exec tmAppvSplitGood ? SET NOCOUNT ON', [$DocuNO]);
                         if ($resStore == true){
                              \DB::commit();
                         } else {
                              \DB::rollBack();
                         }

                         $q = "SELECT DocuNO, RefSOCONo";
                         $q .= ", CONVERT(VARCHAR, DocuDate, 6) DocuDate";
                         $q .= ", CONVERT(VARCHAR, ShipDate, 6) ShipDate";
                         $q .= ", CustName";
                         $q .= ", EmpName";
                         $q .= ", GoodName1";
                         $q .= ", AppvStatus";
                         $q .= ", AppvSplitStatus";
                         $q .= " FROM icGodSplit_hd";
                         $q .= " WHERE AppvStatus = 'Y'";
                         $q .= " ORDER BY DocuNO DESC";
                         $return['details'] = \DB::select($q);
                         // $details = ICGodSplitHD::where('AppvStatus', '=', 'Y')->orderBy('DocuNO', 'desc')->get();
                         // $return['details'] = $details;
                         $return['status'] = 1;
                         $return['content'] = 'จัดเก็บสำเร็จ';
                    }
               } catch (Exception $e) {
                    \DB::rollBack();
                    $return['status'] = 0;
                    $return['content'] = 'ไม่สำเร็จ'.$e->getMessage();
               }
          } else{
               $return['status'] = 0;
          }
          return json_encode($return);
     }
}
