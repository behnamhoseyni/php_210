<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $table = 'products';

    public function categories()
    {
        return $this->belongsto(Category::class);
    }

    public function manu_factures()
    {
        return $this->belongsto(ManuFacture::class);
    }
     public function Admin()
    {
        return $this->hasone(Admin::class);
    }

}
