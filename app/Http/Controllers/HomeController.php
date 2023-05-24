<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Jadwal;
use App\Models\Kirim;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Item::all();

        $x = Jadwal::where('tanggal',Carbon::today())->get();

        return view('home' , ['data'=>$data]);
    }

    public function search(Request $request){
        $data = Item::where('name' , 'LIKE' , '%'.$request->search.'%')->get();

        $x = Jadwal::where('tanggal',Carbon::today())->get();

        return view('home' , ['data'=>$data]);
    }

    public function dashboard(){

            $item = Item::all();
            $dipesan = Kirim::where('status' , 'dipesan')->where('pemesan_id' , Auth::id())->get();
            $confirm = Kirim::where('status' , 'confirm')->where('pemesan_id' , Auth::id())->get();
            $pickup = Kirim::where('status' , 'di pickup oleh kurir')->where('pemesan_id' , Auth::id())->get();
            $diantar = Kirim::where('status' , 'diterima')->where('pemesan_id' , Auth::id())->get();
            return view('dashboard', ['item' => $item , 'dipesan' => $dipesan , 'pickup' => $pickup , 'diantar' => $diantar , 'confirm'=>$confirm]);

    }

}
