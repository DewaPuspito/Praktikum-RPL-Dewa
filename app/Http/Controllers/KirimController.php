<?php

namespace App\Http\Controllers;

use App\Models\Kirim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KirimController extends Controller
{
    public function store($id , Request $request){
        $data = new Kirim();
        $data->jadwal_id = $id;
        $data->kurir_id = Auth::user()->id;
        $data->jumlah = $request->qty;
        $data->status = 'dipesan';
        $data->pemesan_id = Auth::id();
        $data->save();
        return redirect()->back();
}

    public function confirm($id , Request $request){
        $data = Kirim::find($id);
        $data->status = 'confirm';
        $data->kurir_id = $request->kurir_id;
        $data->update();

        return redirect()->back();
    }

    public function pickup($id){
        $data = Kirim::find($id);
        $data->status = 'di pickup oleh kurir';
        $data->update();

        return redirect()->back();
    }

    public function antar($id){
        $data = Kirim::find($id);
        $data->status = 'diterima';
        $data->update();

        return redirect()->back();
    }


}
