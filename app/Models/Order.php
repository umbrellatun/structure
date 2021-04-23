<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $table = "orders";

     public function Company()
     {
          return $this->hasOne(Company::class, 'id', 'company_id');
     }

}
