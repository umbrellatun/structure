<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\ICGodSplitHD;
use App\Models\ICGodSplitDT;

class GodSplitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["title"] = "แบ่งสินค้าเพื่อจัดส่ง";
        $data["headers"] = ICGodSplitHD::where('AppvStatus', '=', 'N')->get();
        return view('godsplitlist', $data);

    }

    public function get_detail(Request $request)
    {
         $DocuNO = $request->DocuNO;
         $validator = Validator::make($request->all(), [

         ]);
         if (!$validator->fails()) {
              try {
                   $details = ICGodSplitDT::where('DocuNO', '=', $DocuNO)->get();
                   $return['status'] = 1;
                   $return['details'] = $details;
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
              try {
                   $data = [
                        'AppvStatus' => $AppvStatus
                   ];
                   ICGodSplitDT::where('DocuNO', '=', $DocuNO)->update($data);
                   $return['status'] = 1;
                   $return['details'] = $details;
              } catch (Exception $e) {
                   $return['status'] = 0;
              }
         } else{
              $return['status'] = 0;
         }
         return json_encode($return);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
