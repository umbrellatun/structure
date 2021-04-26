<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

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
         $data["title"] = "แบ่งสินค้าเพื่อจัดส่ง";
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
         $validator = Validator::make($request->all(), [

         ]);
         if (!$validator->fails()) {
              try {
                   $q = "SELECT RefSOCOID, RefListNo, RefSOCONo, SOHD.DocuDate, CustAddress, GoodPrice2, TranQty, SOHD.ShipDate";
                   $q .= " FROM tmConTain_bk_dt_Temp INNER JOIN";
                   $q .= " SOHD ON tmConTain_bk_dt_Temp.RefSOCOID = SOHD.SOID";
                   $q .= " WHERE TranQty <> 0 AND CustCode = '$CustCode' AND GoodCode = '$GoodCode'";
                   // $q .= " AND CONVERT(Varchar, SOHD.ShipDate, 112) = '.$ShipDate.'";
                   $q .= " UNION ALL";
                   $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, SOHD.DocuDate, CustAddress, GoodPrice2, TranQty, SOHD.ShipDate";
                   $q .= " FROM tmConTain_dl_dt_Temp INNER JOIN";
                   $q .= " SOHD ON tmConTain_dl_dt_Temp.RefSOCOID = SOHD.SOID";
                   $q .= " WHERE TranQty <> 0 AND CustCode = '$CustCode' AND GoodCode = '$GoodCode'";
                   // $q .= " AND CONVERT(Varchar, SOHD.ShipDate, 112) = '$ShipDate'";
                   $q .= " UNION ALL";
                   $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, SOHD.DocuDate, CustAddress, GoodPrice2, TranQty, SOHD.ShipDate";
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

    public function get_product(Request $request)
    {
         // dd($request->all());
         $share_product = $request->share_product_radio;
         $validator = Validator::make($request->all(), [

         ]);
         if (!$validator->fails()) {
              try {
                   // if ($share_product == 'Y') {
                   //      $emp_code = $request->sale_code;
                   // } else {
                   //
                   // }
                   $q = "SELECT RefSOCOID, RefListNo, RefSOCONo, SOHD.DocuDate, SOHD.CustName, tmConTain_bk_dt.EmpCode, tmConTain_bk_dt.EmpName, tmConTain_bk.ContainerNO";
                   $q .= ", CASE WHEN tmConTain_bk.Flag_st = 'Y' THEN 'ปิด'  WHEN tmConTain_bk.Flag_st = 'R' THEN 'เตรียม' ELSE '' END AS Flag_st, TranQty";
                   $q .= " FROM tmConTain_bk";
                   $q .= " INNER JOIN tmConTain_bk_dt ON tmConTain_bk.ContainerNO = tmConTain_bk_dt.ContainerNO";
                   $q .= " INNER JOIN SOHD ON tmConTain_bk_dt.RefSOCOID = SOHD.SOID";
                   $q .= " WHERE";
                   $q .= " TranQty <> 0";
                   $q .= " AND tmConTain_bk_dt.EmpCode <> '110134'";
                   $q .= " AND CustCode <> 'C10-00008'";
                   $q .= " AND GoodCode = 'FOM0010000508'";
                   $q .= " AND tmConTain_bk.Flag_st IN ( 'N', 'Y', 'R' )";
                   $q .= " AND CONVERT ( VARCHAR, SOHD.ShipDate, 112 ) = '20210427'";
                   $q .= " UNION ALL";
                   $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, SOHD.DocuDate, SOHD.CustName, tmConTain_dl_dt.EmpCode, tmConTain_dl_dt.EmpName, tmConTain_dl.ContainerNO";
                   $q .= ", CASE WHEN tmConTain_dl.Flag_st = 'Y' THEN 'ปิด'  WHEN tmConTain_dl.Flag_st = 'R' THEN 'เตรียม' ELSE ''  END AS Flag_st, TranQty";
                   $q .= " FROM tmConTain_dl";
                   $q .= " INNER JOIN tmConTain_dl_dt ON tmConTain_dl.ContainerNO = tmConTain_dl_dt.ContainerNO";
                   $q .= " INNER JOIN SOHD ON tmConTain_dl_dt.RefSOCOID = SOHD.SOID";
                   $q .= " WHERE";
                   $q .= " TranQty <> 0";
                   $q .= " AND tmConTain_dl_dt.EmpCode <> '110134'";
                   $q .= " AND CustCode <> 'C10-00008'";
                   $q .= " AND GoodCode = 'FOM0010000508'";
                   $q .= " AND tmConTain_dl.Flag_st IN ( 'N', 'Y', 'R' )";
                   $q .= " AND CONVERT ( VARCHAR, SOHD.ShipDate, 112 ) = '20210427'";
                   $q .= " UNION ALL";
                   $q .= " SELECT RefSOCOID, RefListNo, RefSOCONo, SOHD.DocuDate, SOHD.CustName, tmConTain_dt.EmpCode, tmConTain_dt.EmpName, tmConTain.ContainerNO";
                   $q .= ", CASE WHEN tmConTain.Flag_st = 'Y' THEN 'ปิด'  WHEN tmConTain.Flag_st = 'R' THEN 'เตรียม' ELSE ''  END AS Flag_st, TranQty";
                   $q .= " FROM tmConTain";
                   $q .= " INNER JOIN tmConTain_dt ON tmConTain.ContainerNO = tmConTain_dt.ContainerNO";
                   $q .= " INNER JOIN SOHD ON tmConTain_dt.RefSOCOID = SOHD.SOID";
                   $q .= " WHERE";
                   $q .= " TranQty <> 0";
                   $q .= " AND tmConTain_dt.EmpCode <> '110134'";
                   $q .= " AND CustCode <> 'C10-00008'";
                   $q .= " AND GoodCode = 'FOM0010000508'";
                   $q .= " AND tmConTain.Flag_st IN ( 'N', 'Y', 'R' )";
                   $q .= " AND CONVERT ( VARCHAR, SOHD.ShipDate, 112 ) = '20210427'";

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


}
