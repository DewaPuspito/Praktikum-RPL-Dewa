<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'item';

    public function jadwal(){
        return $this->hasMany(Jadwal::class , 'item_id' , 'id');
    }


}
