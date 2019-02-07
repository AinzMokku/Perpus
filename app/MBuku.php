<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MBuku extends Model
{
    //
    protected $table = "tb_buku";
    public $timestamps = false;
    protected $guarded = ['kd_buku'];
}
