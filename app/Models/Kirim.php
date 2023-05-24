<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kirim extends Model
{
    use HasFactory;

    protected $table = 'kirim';

    public function jadwal(){
        return $this->belongsTo(Jadwal::class , 'jadwal_id' , 'id');
    }

    public function kurir(){
        return $this->belongsTo(User::class, 'kurir_id', 'id');
    }

    public function pemesan(){
        return $this->belongsTo(User::class , 'pemesan_id' , 'id');
    }
}
