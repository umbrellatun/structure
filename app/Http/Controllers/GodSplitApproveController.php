<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\ICGodSplitHD;
use App\Models\ICGodSplitDT;
use Illuminate\Database\QueryException;

class GodSplitApproveController extends Controller
{
     public function index()
     {
          $today = date("Y-m-d");
          $previous_day = date('Y-m-d',strtotime($today . "-15 days"));
          $data["daterange"] = date_format(date_create($previous_day), "m/d/Y") . ' - ' . date_format(date_create($today), "m/d/Y");
          $data["title"] = "ยืนยันแบ่งสินค้า";
          $data["headers"] = ICGodSplitHD::where('AppvStatus', '=', 'Y')
                              ->where(function($q)use($previous_day, $today){
                                   $q->whereRaw("CONVERT(Varchar, [DocuDate], 112) BETWEEN '".$previous_day."' AND '".$today."'");
                              })
                              ->orderByRaw("ISNULL(AppvSplitStatus, ''), AppvStatus ASC")
                              ->orderBy('DocuNO', 'desc')
                              ->get();

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
                    if($AppvStatus == 'R'){
                         \DB::beginTransaction();
                         $data = [
                              'AppvSplitStatus' => 'R'
                         ];
                         ICGodSplitHD::where('DocuNO', '=', $DocuNO)->update($data);
                         \DB::commit();
                         $return['status'] = 1;
                         $return['content'] = 'Reject สำเร็จ';
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
                    } else {
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
                         } else {
                              $arr = [];
                              $q = "SELECT dbo.GET_CheckStatusSPDT('$DocuNO') AS status_dt";
                              $check_flag_dts = \DB::connection("sqlsrv109")->select($q);
                              foreach ($check_flag_dts as $check_flag_dt) {
                                   array_push($arr, $check_flag_dt->status_dt);
                              }
                              if (in_array('N', $arr)){
                                   $return['status'] = 0;
                                   $return['title'] = 'ไม่สามารถดำเนินการแบ่งสินค้าได้';
                                   $return['content'] = 'เนื่องจากสถานะตู้ปิดแล้ว กรุณาตรวจสอบ...';
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
                              } else {
                                   $resStore = \DB::connection("sqlsrv109")->statement('exec tmAppvSplitGood ? SET NOCOUNT ON', [$DocuNO]);
                                   if ($resStore == true){
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
                                   } else {
                                        // \DB::rollBack();
                                        $return['status'] = 0;
                                   }
                              }
                         }
                    }
               } catch (Exception $ep) {
                    \DB::rollBack();
                    $return['status'] = 0;
                    $return['content'] = 'ไม่สำเร็จ'.$ep->getMessage();
               } catch (QueryException $e) {
                    \DB::rollBack();
                    $return['status'] = 0;
                    $return['content'] = 'ไม่สำเร็จ'.$e->getMessage();
               } catch (\Throwable $exception) {
                    \DB::rollBack();
                    $return['status'] = 0;
                    $return['content'] = 'ไม่สำเร็จ'.$e->getMessage();
                    throw new InvalidPaginationException();
               } catch (\PDOException $exception) {
                    \DB::rollBack();
                    $return['status'] = 0;
                    $return['content'] = 'ไม่สำเร็จ'.$ep->getMessage();
                    throw new InvalidPaginationException();
               }
          } else{
               $return['status'] = 0;
          }
          return json_encode($return);
     }

     public function test($value='')
     {
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
          return json_encode($return);
     }
}
