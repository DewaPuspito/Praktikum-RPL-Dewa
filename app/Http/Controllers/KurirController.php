<?php

namespace App\Http\Controllers;

use App\Models\Kirim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KurirController extends Controller
{
    public function index(){
        $data = Kirim::where('kurir_id' , Auth::id())->get();
        return view('kurir.kurir' , ['confirm'=>$data]);
    }
}
