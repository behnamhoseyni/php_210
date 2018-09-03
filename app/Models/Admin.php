<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
protected $primaryKey = 'admin_id';
protected $table = 'tbl_admin';
    protected $guarded = ["admin_id"];

}
