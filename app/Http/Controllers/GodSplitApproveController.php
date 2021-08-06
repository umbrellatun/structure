<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\ICGodSplitHD;
use App\Models\ICGodSplitDT;
use Illuminate\Database\QueryException;
use DateTime;

class GodSplitApproveController extends Controller
{
     public function index(Request $request)
     {
          $data["title"] = "ยืนยันแบ่งสินค้า";
          if ($request->daterange) {
               $daterange = $request->daterange;
               $str_date = explode('-', $daterange);
               $start_date = self::ConvertDate($str_date[0]);
               $end_date = self::ConvertDate($str_date[1]);

               $data["daterange"] = date_format(date_create($start_date), "d M Y") . ' - ' . date_format(date_create($end_date), "d M Y");
               $data["headers"] = ICGodSplitHD::where('AppvStatus', '=', 'Y')
               ->where(function($q)use($start_date, $end_date){
                    $q->whereRaw("CONVERT(Varchar, [DocuDate], 112) BETWEEN '".$start_date."' AND '".$end_date."'");
               })
               // ->orderByRaw("ISNULL(AppvSplitStatus, ''), AppvStatus ASC")
               ->orderBy('DocuNO', 'desc')
               ->get();
          } else {
               $today = date("Y-m-d");
               $previous_day = date('Y-m-d',strtotime($today . "-15 days"));
               $data["daterange"] = date_format(date_create($previous_day), "d M Y") . ' - ' . date_format(date_create($today), "d M Y");
               // dd($data["daterange"]);
               $data["headers"] = ICGodSplitHD::where('AppvStatus', '=', 'Y')
               ->where(function($q)use($previous_day, $today){
                    $q->whereRaw("CONVERT(Varchar, [DocuDate], 112) BETWEEN '".$previous_day."' AND '".$today."'");
               })
               // ->orderByRaw("ISNULL(AppvSplitStatus, ''), AppvStatus ASC")
               ->orderBy('DocuNO', 'desc')
               ->get();
               // dd($data["headers"]);
          }
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
          $today = date("Y-m-d");
          $AppvStatus = $request->AppvStatus;
          $DocuNO = $request->DocuNO;
          if ($request->daterange_modal){
               $daterange = $request->daterange_modal;
               $str_date = explode('-', $daterange);
               $start_date = self::ConvertDate($str_date[0]);
               $end_date = self::ConvertDate($str_date[1]);
          } else {
               $start_date = date('Y-m-d',strtotime($today . "-15 days"));
               $end_date = date("Y-m-d");
          }
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
                         $q .= " AND (CONVERT(Varchar, [DocuDate], 112) BETWEEN $start_date AND $end_date)";
                         $q .= " ORDER BY DocuNO DESC";
                         // $q .= " ORDER BY ISNULL(AppvSplitStatus, '')";
                         // $q .= ", AppvStatus ASC, [DocuNO] DESC";
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
                              $q .= " AND (CONVERT(Varchar, [DocuDate], 112) BETWEEN $start_date AND $end_date)";
                              $q .= " ORDER BY DocuNO DESC";
                              // $q .= " ORDER BY ISNULL(AppvSplitStatus, '')";
                              // $q .= ", AppvStatus ASC, [DocuNO] DESC";
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
                                   $q .= " AND (CONVERT(Varchar, [DocuDate], 112) BETWEEN $start_date AND $end_date)";
                                   $q .= " ORDER BY DocuNO DESC";
                                   // $q .= " ORDER BY ISNULL(AppvSplitStatus, '')";
                                   // $q .= ", AppvStatus ASC, [DocuNO] DESC";
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
                                        $q .= " AND (CONVERT(Varchar, [DocuDate], 112) BETWEEN $start_date AND $end_date)";
                                        $q .= " ORDER BY DocuNO DESC";
                                        // $q .= " ORDER BY ISNULL(AppvSplitStatus, '')";
                                        // $q .= ", AppvStatus ASC, [DocuNO] DESC";
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
                    $return['content'] = 'ไม่สำเร็จ'.$exception->getMessage();
                    // throw new InvalidPaginationException();
               } catch (\PDOException $exception) {
                    \DB::rollBack();
                    $return['status'] = 0;
                    $return['content'] = 'ไม่สำเร็จ'.$exception->getMessage();
                    // throw new InvalidPaginationException();
               }
          } else{
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
               $today = date("Y-m-d");
               $start_date = date('Y-m-d',strtotime($today . "-15 days"));
               $end_date = date("Y-m-d");
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
          $q .= " AND (CONVERT(Varchar, [DocuDate], 112) BETWEEN $start_date AND $end_date)";
          $q .= " ORDER BY DocuNO DESC";
          // $q .= " ORDER BY ISNULL(AppvSplitStatus, '')";
          // $q .= ", AppvStatus ASC, [DocuNO] DESC";
          $return['details'] = \DB::select($q);
          return json_encode($return);
     }
}
