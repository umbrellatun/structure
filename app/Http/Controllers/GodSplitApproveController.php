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
         $data["title"] = "แบ่งสินค้าเพื่อจัดส่ง";
         $data["headers"] = ICGodSplitHD::where('AppvStatus', '=', 'Y')->get();
         return view('godapprovesplitlist', $data);
    }
}
