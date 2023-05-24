<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{

    public function index(){

    }
    public function store($id,Request $request){
        $data = new Jadwal();
        $data->item_id = $id;
        $data->jam = $request->jam;
        $data->tanggal = $request->tanggal;
        $data->jadwal = $request->tanggal;
        $data->save();

        return redirect()->back();
    }

    public function update($id,Request $request){
        $data = Jadwal::find($id);
        $data->jam = $request->jam;
        $data->tanggal = $request->tanggal;
        $data->update();

        return redirect()->back();
    }

    public function delete($id)
    {
        $data = Jadwal::find($id);
        $data->delete();

        return redirect()->back();
    }
}
