<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ICGodSplitHD extends Model
{
     protected $table = "icGodSplit_hd";
     public $timestamps = false;

     public function ICGodSplitDT()
     {
          return $this->hasMany(ICGodSplitDT::class, 'DocuNO', 'DocuNO');
     }
}
