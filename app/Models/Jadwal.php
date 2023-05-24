<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected  $table = 'jadwal';

    public function item(){
        return $this->belongsTo(Item::class , 'item_id' , 'id');
    }

}
