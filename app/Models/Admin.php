<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
protected $primaryKey = 'id';
protected $table = 'tbl_admin';
protected $guarded = ["id"];

 public function Product()
    {
        return $this->belongsToMany(ManuFactures::class);
    }

}



