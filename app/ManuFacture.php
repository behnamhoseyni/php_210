<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManuFacture extends Model
{
     protected $table = 'manu_factures';
        protected $gurded = ['manufacture_id'];
        
    public function Product()
    {
        return $this->hasMany(Product::class);
 
    }
}
