<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Jadwal;
use App\Models\Kirim;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){
        $item = Item::all();
        $dipesan = Kirim::where('status' , 'dipesan')->get();
        $confirm = Kirim::where('status' , 'confirm')->get();
        $pickup = Kirim::where('status' , 'di pickup oleh kurir')->get();
        $diantar = Kirim::where('status' , 'diterima')->get();
        return view('admin.index', ['item' => $item , 'dipesan' => $dipesan , 'pickup' => $pickup , 'diantar' => $diantar , 'confirm'=>$confirm]);
    }

    public function put($id){
        $item = Item::find($id);
        return view('admin.updateitem', ['item' => $item]);
    }

    public function add(){
        return view('admin.additem');
    }
    //fungsi

    public function store(Request $request){
        $data = new Item();
        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        if ($request->photo != null){
            $file = $request->file('photo');
            $nama = time()."_".$file->getClientOriginalName();
            $photo = 'photo';
            $file->move($photo,$nama);
            $data->photo = $nama;
        }
        $data->save();

        return redirect()->route('admin.index');
    }



    public function update($id ,Request $request){
        $data = Item::find($id);
        $data->name = $request->name;
        $data->description = $request->description;
        $data->price = $request->price;
        if ($request->photo != null){
            $file = $request->file('photo');
            $nama = time()."_".$file->getClientOriginalName();
            $photo = 'photo';
            $file->move($photo,$nama);
            $data->photo = $nama;
        }

        $data->update();
        return redirect()->route('admin.index');
    }

    public function delete($id){
        $data = Item::find($id);
        $data->delete();

        return redirect()->route('admin.index');
    }

}
