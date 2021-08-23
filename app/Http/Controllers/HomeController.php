<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\ICGodSplitHD;
use App\Models\ICGodSplitDT;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($customer_id)
    {
         self::notify_message($customer_id . " : " . "เข้าหน้าแบ่งสินค้าเพื่อจัดส่ง");
         $data["title"] = "แบ่งสินค้าเพื่อจัดส่ง";
         $data['customer_id'] = $customer_id;
         $q = "SELECT 'SP-' + SUBSTRING(CONVERT(Varchar, GETDATE(), 112), 3, 6) + '-' + REPLACE(CONVERT(Varchar, GETDATE(), 108), ':', '') AS DocuNO, GETDATE() AS DocuDate, EMCust.CustCode, EMCust.CustName, EMEmp.EmpCode, EMEmp.empname
         FROM EMCust INNER JOIN EMCustMultiEmp on EMCust.CustID = EMCustMultiEmp.CustID and EMCustMultiEmp.IsDefault = 'Y' INNER JOIN
         EMEmp on EMCustMultiEmp.EmpID = EMEmp.EmpID WHERE EMCust.CustCode = '$customer_id'";
         $data["result"] =  collect(\DB::select($q))->first();

         $q = "SELECT Distinct GoodCode, GoodName1
         FROM (SELECT GoodCode, GoodName1, CustCode FROM tmConTain_bk_dt_Temp WHERE TranQty <> 0 UNION ALL
              SELECT GoodCode, GoodName1, CustCode FROM tmConTain_dl_dt_Temp WHERE TranQty <> 0 UNION ALL
              SELECT GoodCode, GoodName1, CustCode FROM tmConTain_dt_Temp WHERE TranQty <> 0) tmConTain_dt_Temp
              WHERE CustCode = '$customer_id'
              ORDER BY GoodCode";
         $data["products"] =  \DB::select($q);
         return view('welcome', $data);
    }

    public function get_cust_code(Request $request)
    {
         $CustCode = $request->CustCode;
         $GoodCode = $request->GoodCode;
         // $ShipDate = $request->ShipDate;
         $ShipDate = (date_create($request->ShipDate));
         $ShipDate = date_format($ShipDate, 'Ymd');
         self::notify_message($CustCode . " : " . "กด Next เพื่อไปหน้า 2 โดยเลือก" . $GoodCode);
         $validator = Validator::make($request->all(), [

         ]);
         if (!$validator->fails()) {
              try {
                   $q = "SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, CustAddress, GoodPrice2, TranQty, SOHD.ShipDate, EmpCode";
                   $q .= ", DATEDIFF(day, DocuDate, SOHD.ShipDate) AS DateDiff";
                   $q .= " FROM tmConTain_bk_dt_Temp INNER JOIN";
                   $q .= " SOHD ON tmConTain_bk_dt_Temp.RefSOCOID = SOHD.SOID";
                   $q .= " WHERE TranQty <> 0 AND CustCode = '$CustCode' AND GoodCode = '$GoodCode'";
                   // $q .= " AND CONVERT(Varchar, SOHD.ShipDate, 112) = '$ShipDate'";
                   $q .= " UNION ALL";
                   $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, CustAddress, GoodPrice2, TranQty, SOHD.ShipDate, EmpCode";
                   $q .= ", DATEDIFF(day, DocuDate, SOHD.ShipDate) AS DateDiff";
                   $q .= " FROM tmConTain_dl_dt_Temp INNER JOIN";
                   $q .= " SOHD ON tmConTain_dl_dt_Temp.RefSOCOID = SOHD.SOID";
                   $q .= " WHERE TranQty <> 0 AND CustCode = '$CustCode' AND GoodCode = '$GoodCode'";
                   // $q .= " AND CONVERT(Varchar, SOHD.ShipDate, 112) = '$ShipDate'";
                   $q .= " UNION ALL";
                   $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, CustAddress, GoodPrice2, TranQty, SOHD.ShipDate, EmpCode";
                   $q .= ", DATEDIFF(day, DocuDate, SOHD.ShipDate) AS DateDiff";
                   $q .= " FROM tmConTain_dt_Temp INNER JOIN";
                   $q .= " SOHD ON tmConTain_dt_Temp.RefSOCOID = SOHD.SOID";
                   $q .= " WHERE TranQty <> 0 AND CustCode = '$CustCode' AND GoodCode = '$GoodCode'";
                   // $q .= " AND CONVERT(Varchar, SOHD.ShipDate, 112) = '$ShipDate'";

                   // dd($q);
                   $return["datas"] =  \DB::select($q);
                   $return['status'] = 1;
              } catch (Exception $e) {
                   $return['status'] = 0;
              }
         } else{
              $return['status'] = 0;
         }
         return json_encode($return);
    }

    public function get_default_product(Request $request)
    {
         $ref_soco_no = $request->ref_soco_no;
         $RefListNO = $request->RefListNO;
         $goodcode = $request->goodcode;
         $shipdate = (date_create($request->shipdate));
         $shipdate = date_format($shipdate, 'Ymd');
         $EmpCode = $request->EmpCode;
         $customer_id = $request->customer_id;
         self::notify_message($customer_id . " : " . "กด Next เพื่อไปหน้า 3 โดยเลือก " . $ref_soco_no);
         $validator = Validator::make($request->all(), [

         ]);
         if (!$validator->fails()) {
              try {
                   $hd = ICGodSplitHD::where('ReflistNo', '=', $RefListNO)->where('RefSOCONo', '=', $ref_soco_no)
                                            ->whereNull('AppvSplitStatus')
                                            ->first();
                   if(isset($hd)){
                        $return['status'] = 2;
                   } else {
                        // $q = "SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, SOHD.CustName, tmConTain_bk_dt.EmpCode, tmConTain_bk_dt.EmpName, tmConTain_bk.ContainerNO";
                        $q = "SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, CONVERT ( VARCHAR, SOHD.ShipDate, 6) ShipDate, SOHD.CustName, tmConTain_bk_dt.EmpCode, tmConTain_bk_dt.EmpName, tmConTain_bk.ContainerNO";
                        $q .= ", CASE WHEN tmConTain_bk.Flag_st = 'Y' THEN 'ปิด'  WHEN tmConTain_bk.Flag_st = 'R' THEN 'เตรียม' ELSE '' END AS Flag_st, TranQty";
                        $q .= " FROM tmConTain_bk";
                        $q .= " INNER JOIN tmConTain_bk_dt ON tmConTain_bk.ContainerNO = tmConTain_bk_dt.ContainerNO";
                        $q .= " INNER JOIN SOHD ON tmConTain_bk_dt.RefSOCOID = SOHD.SOID";
                        $q .= " WHERE";
                        $q .= " TranQty <> 0";
                        $q .= " AND tmConTain_bk_dt.EmpCode = '$EmpCode'";
                        $q .= " AND CustCode <> '$customer_id'";
                        $q .= " AND GoodCode = '$goodcode'";
                        $q .= " AND tmConTain_bk.Flag_st IN ( 'N', 'Y', 'R' )";
                        // $q .= " AND CONVERT ( VARCHAR, SOHD.ShipDate, 112 ) = '$shipdate'";
                        $q .= " UNION ALL";
                        // $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, SOHD.CustName, tmConTain_dl_dt.EmpCode, tmConTain_dl_dt.EmpName, tmConTain_dl.ContainerNO";
                        $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, CONVERT ( VARCHAR, SOHD.ShipDate, 6) ShipDate, SOHD.CustName, tmConTain_dl_dt.EmpCode, tmConTain_dl_dt.EmpName, tmConTain_dl.ContainerNO";
                        $q .= ", CASE WHEN tmConTain_dl.Flag_st = 'Y' THEN 'ปิด'  WHEN tmConTain_dl.Flag_st = 'R' THEN 'เตรียม' ELSE ''  END AS Flag_st, TranQty";
                        $q .= " FROM tmConTain_dl";
                        $q .= " INNER JOIN tmConTain_dl_dt ON tmConTain_dl.ContainerNO = tmConTain_dl_dt.ContainerNO";
                        $q .= " INNER JOIN SOHD ON tmConTain_dl_dt.RefSOCOID = SOHD.SOID";
                        $q .= " WHERE";
                        $q .= " TranQty <> 0";
                        $q .= " AND tmConTain_dl_dt.EmpCode = '$EmpCode'";
                        $q .= " AND CustCode <> '$customer_id'";
                        $q .= " AND GoodCode = '$goodcode'";
                        $q .= " AND tmConTain_dl.Flag_st IN ( 'N', 'Y', 'R' )";
                        // $q .= " AND CONVERT ( VARCHAR, SOHD.ShipDate, 112 ) = '$shipdate'";
                        $q .= " UNION ALL";
                        // $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, SOHD.CustName, tmConTain_dt.EmpCode, tmConTain_dt.EmpName, tmConTain.ContainerNO";
                        $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, CONVERT ( VARCHAR, SOHD.ShipDate, 6) ShipDate, SOHD.CustName, tmConTain_dt.EmpCode, tmConTain_dt.EmpName, tmConTain.ContainerNO";
                        $q .= ", CASE WHEN tmConTain.Flag_st = 'Y' THEN 'ปิด'  WHEN tmConTain.Flag_st = 'R' THEN 'เตรียม' ELSE ''  END AS Flag_st, TranQty";
                        $q .= " FROM tmConTain";
                        $q .= " INNER JOIN tmConTain_dt ON tmConTain.ContainerNO = tmConTain_dt.ContainerNO";
                        $q .= " INNER JOIN SOHD ON tmConTain_dt.RefSOCOID = SOHD.SOID";
                        $q .= " WHERE";
                        $q .= " TranQty <> 0";
                        $q .= " AND tmConTain_dt.EmpCode = '$EmpCode'";
                        $q .= " AND CustCode <> '$customer_id'";
                        $q .= " AND GoodCode = '$goodcode'";
                        $q .= " AND tmConTain.Flag_st IN ( 'N', 'Y', 'R' )";
                        // $q .= " AND CONVERT ( VARCHAR, SOHD.ShipDate, 112 ) = '$shipdate'";
                        // dd($q);
                        $return["datas"] =  \DB::select($q);
                        $return['status'] = 1;
                   }
              } catch (Exception $e) {
                   $return['status'] = 0;
              }
         } else{
              $return['status'] = 0;
         }
         return json_encode($return);
    }

    public function get_product(Request $request)
    {
         $share_product = $request->share_product_radio;
         $customer_id = $request->customer_id;
         $EmpCode = $request->EmpCode;
         $goodcode = $request->goodcode;
         $shipdate = (date_create($request->shipdate));
         $shipdate = date_format($shipdate, 'Ymd');
         $validator = Validator::make($request->all(), [

         ]);
         if (!$validator->fails()) {
              try {
                   if ($share_product == 'Y') {
                        // $q = "SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, SOHD.CustName, tmConTain_bk_dt.EmpCode, tmConTain_bk_dt.EmpName, tmConTain_bk.ContainerNO";
                        $q = "SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, CONVERT ( VARCHAR, SOHD.ShipDate, 6) ShipDate, SOHD.CustName, tmConTain_bk_dt.EmpCode, tmConTain_bk_dt.EmpName, tmConTain_bk.ContainerNO";
                        $q .= ", CASE WHEN tmConTain_bk.Flag_st = 'Y' THEN 'ปิด'  WHEN tmConTain_bk.Flag_st = 'R' THEN 'เตรียม' ELSE '' END AS Flag_st, TranQty";
                        $q .= " FROM tmConTain_bk";
                        $q .= " INNER JOIN tmConTain_bk_dt ON tmConTain_bk.ContainerNO = tmConTain_bk_dt.ContainerNO";
                        $q .= " INNER JOIN SOHD ON tmConTain_bk_dt.RefSOCOID = SOHD.SOID";
                        $q .= " WHERE";
                        $q .= " TranQty <> 0";
                        $q .= " AND tmConTain_bk_dt.EmpCode = '$EmpCode'";
                        $q .= " AND CustCode <> '$customer_id'";
                        $q .= " AND GoodCode = '$goodcode'";
                        $q .= " AND tmConTain_bk.Flag_st IN ( 'N', 'Y', 'R' )";
                        // $q .= " AND CONVERT ( VARCHAR, SOHD.ShipDate, 112 ) = '$shipdate'";
                        $q .= " UNION ALL";
                        // $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, SOHD.CustName, tmConTain_dl_dt.EmpCode, tmConTain_dl_dt.EmpName, tmConTain_dl.ContainerNO";
                        $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, CONVERT ( VARCHAR, SOHD.ShipDate, 6) ShipDate, SOHD.CustName, tmConTain_dl_dt.EmpCode, tmConTain_dl_dt.EmpName, tmConTain_dl.ContainerNO";
                        $q .= ", CASE WHEN tmConTain_dl.Flag_st = 'Y' THEN 'ปิด'  WHEN tmConTain_dl.Flag_st = 'R' THEN 'เตรียม' ELSE ''  END AS Flag_st, TranQty";
                        $q .= " FROM tmConTain_dl";
                        $q .= " INNER JOIN tmConTain_dl_dt ON tmConTain_dl.ContainerNO = tmConTain_dl_dt.ContainerNO";
                        $q .= " INNER JOIN SOHD ON tmConTain_dl_dt.RefSOCOID = SOHD.SOID";
                        $q .= " WHERE";
                        $q .= " TranQty <> 0";
                        $q .= " AND tmConTain_dl_dt.EmpCode = '$EmpCode'";
                        $q .= " AND CustCode <> '$customer_id'";
                        $q .= " AND GoodCode = '$goodcode'";
                        $q .= " AND tmConTain_dl.Flag_st IN ( 'N', 'Y', 'R' )";
                        // $q .= " AND CONVERT ( VARCHAR, SOHD.ShipDate, 112 ) = '$shipdate'";
                        $q .= " UNION ALL";
                        // $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, SOHD.CustName, tmConTain_dt.EmpCode, tmConTain_dt.EmpName, tmConTain.ContainerNO";
                        $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, CONVERT ( VARCHAR, SOHD.ShipDate, 6) ShipDate, SOHD.CustName, tmConTain_dt.EmpCode, tmConTain_dt.EmpName, tmConTain.ContainerNO";
                        $q .= ", CASE WHEN tmConTain.Flag_st = 'Y' THEN 'ปิด'  WHEN tmConTain.Flag_st = 'R' THEN 'เตรียม' ELSE ''  END AS Flag_st, TranQty";
                        $q .= " FROM tmConTain";
                        $q .= " INNER JOIN tmConTain_dt ON tmConTain.ContainerNO = tmConTain_dt.ContainerNO";
                        $q .= " INNER JOIN SOHD ON tmConTain_dt.RefSOCOID = SOHD.SOID";
                        $q .= " WHERE";
                        $q .= " TranQty <> 0";
                        $q .= " AND tmConTain_dt.EmpCode = '$EmpCode'";
                        $q .= " AND CustCode <> '$customer_id'";
                        $q .= " AND GoodCode = '$goodcode'";
                        $q .= " AND tmConTain.Flag_st IN ( 'N', 'Y', 'R' )";
                        // $q .= " AND CONVERT ( VARCHAR, SOHD.ShipDate, 112 ) = '$shipdate'";
                   } else {
                        // $q = "SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, SOHD.CustName, tmConTain_bk_dt.EmpCode, tmConTain_bk_dt.EmpName, tmConTain_bk.ContainerNO";
                        $q = "SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, CONVERT ( VARCHAR, SOHD.ShipDate, 6) ShipDate, SOHD.CustName, tmConTain_bk_dt.EmpCode, tmConTain_bk_dt.EmpName, tmConTain_bk.ContainerNO";
                        $q .= ", CASE WHEN tmConTain_bk.Flag_st = 'Y' THEN 'ปิด'  WHEN tmConTain_bk.Flag_st = 'R' THEN 'เตรียม' ELSE '' END AS Flag_st, TranQty";
                        $q .= " FROM tmConTain_bk";
                        $q .= " INNER JOIN tmConTain_bk_dt ON tmConTain_bk.ContainerNO = tmConTain_bk_dt.ContainerNO";
                        $q .= " INNER JOIN SOHD ON tmConTain_bk_dt.RefSOCOID = SOHD.SOID";
                        $q .= " WHERE";
                        $q .= " TranQty <> 0";
                        $q .= " AND tmConTain_bk_dt.EmpCode <> '$EmpCode'";
                        $q .= " AND CustCode <> '$customer_id'";
                        $q .= " AND GoodCode = '$goodcode'";
                        $q .= " AND tmConTain_bk.Flag_st IN ( 'N', 'Y', 'R' )";
                        // $q .= " AND CONVERT ( VARCHAR, SOHD.ShipDate, 112 ) = '$shipdate'";
                        $q .= " UNION ALL";
                        // $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, SOHD.CustName, tmConTain_dl_dt.EmpCode, tmConTain_dl_dt.EmpName, tmConTain_dl.ContainerNO";
                        $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, CONVERT ( VARCHAR, SOHD.ShipDate, 6) ShipDate, SOHD.CustName, tmConTain_dl_dt.EmpCode, tmConTain_dl_dt.EmpName, tmConTain_dl.ContainerNO";
                        $q .= ", CASE WHEN tmConTain_dl.Flag_st = 'Y' THEN 'ปิด'  WHEN tmConTain_dl.Flag_st = 'R' THEN 'เตรียม' ELSE ''  END AS Flag_st, TranQty";
                        $q .= " FROM tmConTain_dl";
                        $q .= " INNER JOIN tmConTain_dl_dt ON tmConTain_dl.ContainerNO = tmConTain_dl_dt.ContainerNO";
                        $q .= " INNER JOIN SOHD ON tmConTain_dl_dt.RefSOCOID = SOHD.SOID";
                        $q .= " WHERE";
                        $q .= " TranQty <> 0";
                        $q .= " AND tmConTain_dl_dt.EmpCode <> '$EmpCode'";
                        $q .= " AND CustCode <> '$customer_id'";
                        $q .= " AND GoodCode = '$goodcode'";
                        $q .= " AND tmConTain_dl.Flag_st IN ( 'N', 'Y', 'R' )";
                        // $q .= " AND CONVERT ( VARCHAR, SOHD.ShipDate, 112 ) = '$shipdate'";
                        $q .= " UNION ALL";
                        // $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, SOHD.CustName, tmConTain_dt.EmpCode, tmConTain_dt.EmpName, tmConTain.ContainerNO";
                        $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, CONVERT ( VARCHAR, SOHD.DocuDate, 6) DocuDate, CONVERT ( VARCHAR, SOHD.ShipDate, 6) ShipDate, SOHD.CustName, tmConTain_dt.EmpCode, tmConTain_dt.EmpName, tmConTain.ContainerNO";
                        $q .= ", CASE WHEN tmConTain.Flag_st = 'Y' THEN 'ปิด'  WHEN tmConTain.Flag_st = 'R' THEN 'เตรียม' ELSE ''  END AS Flag_st, TranQty";
                        $q .= " FROM tmConTain";
                        $q .= " INNER JOIN tmConTain_dt ON tmConTain.ContainerNO = tmConTain_dt.ContainerNO";
                        $q .= " INNER JOIN SOHD ON tmConTain_dt.RefSOCOID = SOHD.SOID";
                        $q .= " WHERE";
                        $q .= " TranQty <> 0";
                        $q .= " AND tmConTain_dt.EmpCode <> '$EmpCode'";
                        $q .= " AND CustCode <> '$customer_id'";
                        $q .= " AND GoodCode = '$goodcode'";
                        $q .= " AND tmConTain.Flag_st IN ( 'N', 'Y', 'R' )";
                        // $q .= " AND CONVERT ( VARCHAR, SOHD.ShipDate, 112 ) = '$shipdate'";
                   }
                   // dd($q);
                   $return["datas"] =  \DB::select($q);
                   $return['status'] = 1;
              } catch (Exception $e) {
                   $return['status'] = 0;
              }
         } else{
              $return['status'] = 0;
         }
         return json_encode($return);
    }

    public function store(Request $request)
    {
         // dd($request->all());
         $DocuNO = $request->DocuNO;
         $DocuDate = $request->DocuDate;
         $CustCode = $request->CustCode;
         $CustName = $request->CustName;
         $EmpCode = $request->EmpCode;
         $empname = $request->empname;
         $GoodCode = $request->GoodCode;
         $GoodName1 = $request->GoodName1;
         $ShipDate = $request->ShipDate;
         $RefSOCOID = $request->RefSOCOID;
         $RefListNO = $request->RefListNO;
         $RefSOCONo = $request->RefSOCONo;
         $DocuDate2 = $request->DocuDate2;
         $CustAddress = $request->CustAddress;
         $GoodPrice2 = $request->GoodPrice2;
         $TranQty = $request->TranQty;
         $SentQty = $request->SentQty;
         $AppvStatus = $request->share_product_radio;

         $tb4_RefSOCOID = $request->tb4_RefSOCOID;
         $tb4_RefListNO = $request->tb4_RefListNO;
         $tb4_RefSOCONo = $request->tb4_RefSOCONo;
         $tb4_DocuDate = $request->tb4_DocuDate;
         $tb4_CustName = $request->tb4_CustName;
         $tb4_EmpCode = $request->tb4_EmpCode;
         $tb4_EmpName = $request->tb4_EmpName;
         $tb4_ContainerNO = $request->tb4_ContainerNO;
         $tb4_Flag_st = $request->tb4_Flag_st;
         $tb4_TranQty = $request->tb4_TranQty;
         $tb4_SplitQty = $request->tb4_SplitQty;

         $validator = Validator::make($request->all(), [

         ]);
         if (!$validator->fails()) {
              \DB::beginTransaction();
              try {
                   $find = array();
                   for ($i=0; $i < count($tb4_RefSOCONo); $i++) {
                        $dts = ICGodSplitDT::where('RefSOCONo', '=', $tb4_RefSOCONo[$i])->where('RefListNO', '=', $tb4_RefListNO)->get();
                        foreach ($dts as $dt) {
                             $hd = ICGodSplitHD::where('DocuNO', '=', $dt->DocuNO)->whereNull('AppvSplitStatus')->first();
                             if ($hd){
                                  array_push($find, 0);
                             } else {
                                  array_push($find, 1);
                             }
                        }
                   }
                   if (in_array(0, $find)){
                        $return['status'] = 2;
                        $return['content'] = 'ไม่สามารถเลือกได้ เนื่่องจากรายการดังกล่าวกำลังอยู่ระหว่างดำเนินการ';
                        self::notify_message($tb4_CustName . " : " . $return['content']);
                   } else {
                        /* TODO Call database 192.168.1.112 icConLockforSplit ที่ DocuNo */
                        // $lock_for_split = \DB::connection("sqlsrv112")->statement('exec icConLockforSplit ? SET NOCOUNT ON', [$DocuNO]);
                        // if ($lock_for_split == true){
                        //
                        // } else {
                        //
                        // }
                        $data = [
                             'DocuNO' => $DocuNO
                             ,'DocuDate' => date_format(date_create($DocuDate), 'Y-m-d H:i:s')
                             ,'CustCode' => $CustCode
                             ,'CustName' => $CustName
                             ,'EmpCode' => $EmpCode
                             ,'EmpName' => $empname
                             ,'GoodCode' => $GoodCode
                             ,'GoodName1' => $GoodName1
                             ,'ShipDate' => $ShipDate
                             ,'RefSOCOID' => $RefSOCOID
                             ,'RefListNO' => $RefListNO
                             ,'RefSOCONo' => $RefSOCONo
                             ,'RefSOCODate' => $DocuDate2
                             ,'CustAddress' => $CustAddress
                             ,'GoodPrice2' => $GoodPrice2
                             ,'TranQty' => $TranQty
                             ,'SentQty' => $SentQty
                             ,'AppvStatus' => $AppvStatus
                             // ,'AppvSplitStatus' =>
                        ];
                        \DB::table('icGodSplit_hd')->insert($data);

                        for ($i=0; $i < count($tb4_RefSOCOID) ; $i++) {
                             $data = [
                                  'DocuNO' => $DocuNO
                                  ,'RefSOCOID' => $tb4_RefSOCOID[$i]
                                  ,'RefListNO' => $tb4_RefListNO[$i]
                                  ,'RefSOCONo' => $tb4_RefSOCONo[$i]
                                  ,'RefSOCODate' => $tb4_DocuDate[$i]
                                  ,'CustName' => $tb4_EmpName[$i]
                                  ,'EmpCode' => $tb4_EmpCode[$i]
                                  ,'EmpName' => $tb4_CustName[$i]
                                  ,'ContainerNO' => $tb4_ContainerNO[$i]
                                  ,'Flag_st' => $tb4_Flag_st[$i]
                                  ,'TranQty' => $tb4_TranQty[$i]
                                  ,'SplitQty' => $tb4_SplitQty[$i]
                             ];
                             \DB::table('icGodSplit_dt')->insert($data);
                        }
                        \DB::commit();
                        self::notify_message($CustCode . " จัดเก็บสำเร็จ" );
                        $return['status'] = 1;
                        $return['content'] = 'จัดเก็บสำเร็จ';
                   }
              } catch (Exception $e) {
                   \DB::rollBack();
                   $return['status'] = 0;
                   $return['content'] = 'ไม่สำเร็จ'.$e->getMessage();
                   self::notify_message($return['content']);
              }
         } else{
              $return['status'] = 0;
              self::notify_message($return['status']);
         }
         return json_encode($return);

    }

    public function getSelfProduct(Request $request)
    {
         $CustCode = $request->CustCode;
         $validator = Validator::make($request->all(), [

         ]);
         if (!$validator->fails()) {
              try {
                   // $hds = ICGodSplitHD::where('CustCode', '=', $CustCode)
                   //                      ->orderBy('DocuNO', 'desc')
                   //                      ->get();
                   $q = "SELECT DocuNO, RefSOCONo, CONVERT ( VARCHAR, DocuDate, 6) DocuDate, CONVERT ( VARCHAR, ShipDate, 6) ShipDate, CustName, GoodName1, AppvStatus, AppvSplitStatus";
                   $q .= " FROM icGodSplit_hd";
                   $q .= " WHERE CustCode = '$CustCode'";
                   $q .= " ORDER BY DocuNO DESC";
                   // dd($q);
                   $return["hds"] =  \DB::select($q);
                   $return['status'] = 1;
                   // $return['hds'] = $hds;
                   $return['content'] = 'จัดเก็บสำเร็จ';
              } catch (Exception $e) {
                   $return['status'] = 0;
                   $return['content'] = 'ไม่สำเร็จ'.$e->getMessage();
              }
         } else{
              $return['status'] = 0;
         }
         return json_encode($return);
    }

    public function getSelfProductDetail(Request $request)
    {
         $DocuNO = $request->DocuNO;
         $validator = Validator::make($request->all(), [

         ]);
         if (!$validator->fails()) {
              try {
                   // $dts = ICGodSplitDT::where('DocuNO', '=', $DocuNO)->get();
                   $q = "SELECT";
                   $q .= " DocuNO";
                   $q .= ", RefSOCONo";
                   $q .= ", CONVERT ( VARCHAR, RefSOCODate, 6) RefSOCODate";
                   $q .= ", CustName";
                   $q .= ", ContainerNO";
                   $q .= ", SplitQty";
                   $q .= " FROM icGodSplit_dt";
                   $q .= " WHERE DocuNO = '$DocuNO'";
                   // dd($q);
                   $return["dts"] =  \DB::select($q);
                   $return['status'] = 1;
                   // $return['dts'] = $dts;
                   $return['content'] = 'จัดเก็บสำเร็จ';
              } catch (Exception $e) {
                   $return['status'] = 0;
                   $return['content'] = 'ไม่สำเร็จ'.$e->getMessage();
              }
         } else{
              $return['status'] = 0;
         }
         return json_encode($return);
    }

    public function maintenance(Request $request)
    {
         $current_date = ($request->current_date) . '0000';
         $validator = Validator::make($request->all(), [

         ]);
         if (!$validator->fails()) {
              try {
                   $q = "select * from icOptProg where OptID = 51";
                   $condition =  \DB::select($q);
                   if ($condition){
                        $OptDetail = $condition[0]->OptDetail;
                        $OptValue = explode('-', $condition[0]->OptValue);
                        $start_date = $OptValue[0];
                        $end_date = $OptValue[1];
                        // dd($current_date . ":" . $start_date);
                        if ($current_date < $start_date) {
                             $return['status'] = 1;
                             $return['content'] = $OptDetail;
                        } elseif ($current_date >= $start_date and $current_date <= $end_date) {
                             $return['status'] = 2;
                             $return['content'] = $OptDetail;
                        } elseif ($current_date > $start_date and $current_date > $end_date) {
                             $return['status'] = 3;
                             $return['content'] = '';
                        }
                   } else {
                        $return['status'] = 0;
                        $return['content'] = 'ไม่สามารถเช็ควันที่ได้';
                   }
              } catch (Exception $e) {
                   $return['status'] = 0;
                   $return['content'] = 'ไม่สำเร็จ'.$e->getMessage();
              }
         } else{
              $return['status'] = 0;
         }
         return json_encode($return);

    }

    function notify_message($message){
         $url = "https://notify-api.line.me/api/notify";

         $curl = curl_init($url);
         curl_setopt($curl, CURLOPT_URL, $url);
         curl_setopt($curl, CURLOPT_POST, true);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

         $headers = array(
              "Authorization: Bearer HSWXY37a1BWYoDiWm1JnlpmBTJ3nLbu4At8bJPnNtGw",
              "Content-Type: application/x-www-form-urlencoded",
         );
         curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

         $data = "message=" . $message;

         curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

         //for debug only!
         curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
         curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

         $resp = curl_exec($curl);
         curl_close($curl);
    }

}
