<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	
    protected $table = 'categories';

    public function Product()
    {
        return $this->hasmany(Product::class);
 
    }

}