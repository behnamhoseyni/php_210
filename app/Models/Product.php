<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $table = 'products';
        protected $gurded = ['id'];

    public function categories()
    {
        return $this->belongto(Category::class);
    }

    public function manufactures()
    {
        return $this->belongto(ManuFactures::class);
    }
     public function Admin()
    {
        return $this->hasone(Admin::class);
    }
}
