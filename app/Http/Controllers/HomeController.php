<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
