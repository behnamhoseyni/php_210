<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManuFacture extends Model
{
     protected $table = 'manu_factures';        
    public function Product()
    {
        return $this->hasmany(Product::class);
 
    }
}
