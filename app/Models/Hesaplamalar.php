<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hesaplamalar extends Model
{
    use HasFactory;

    protected $table = "hesaplamalar";

    public function Tesis(){
           return $this->hasOne('App\Models\Tesis','id','tesis_id');
    }

    public function Yakit(){
        return $this->hasOne('App\Models\Yakit','yakit_id','yakit_id');
    }

    public function Birim(){
        return $this->hasOne('App\Models\Birim','birim_id','birim_id');
    }


    public $timestamps = false;
}
