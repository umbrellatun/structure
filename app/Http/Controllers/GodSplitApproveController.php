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
                    $details = ICGodSplitDT::where('DocuNO', '=', $DocuNO)->get();
                    $header = ICGodSplitHD::where('DocuNO', '=', $DocuNO)->first();
                    $return['status'] = 1;
                    $return['details'] = $details;
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
                    $data = [
                         'AppvSplitStatus' => $AppvStatus
                    ];
                    ICGodSplitHD::where('DocuNO', '=', $DocuNO)->update($data);
                    \DB::commit();

                    $details = ICGodSplitHD::where('AppvStatus', '=', 'Y')->orderBy('DocuNO', 'desc')->get();
                    $return['details'] = $details;
                    $return['status'] = 1;
                    $return['content'] = 'จัดเก็บสำเร็จ';
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
