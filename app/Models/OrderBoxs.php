<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderBoxs extends Model
{
     protected $table = "order_boxs";

     public function Box()
     {
          return $this->hasOne(Box::class, 'id', 'box_id');
     }
}
