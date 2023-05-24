@extends('layouts.app')
@section('content')
    @foreach($confirm as $x)
        <div class="container p-5">
            <div class="card p-5">
                <h1 class="text-center">Antaran hari Ini</h1>
            <div class="card m-2" style="width: 18rem;">
                <img src="{{asset('/photo/'.$x->jadwal->item->photo)}}" class="card-img-top h-50" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$x->jadwal->item->name}}</h5>
                    <h5 class="card-title">{{$x->jumlah}}</h5>
                    <h5 class="card-title">Nama Pemesan : {{$x->pemesan->name}}</h5>
                    <h5 class="card-title">Alamat : {{$x->pemesan->alamat}}</h5>
                    @if($x->status == 'confirm')
                        <a href="{{route('kurir.pickup' , ['id'=>$x->id])}}" class="btn btn-success w-100" >Pickup</a>
                    @elseif($x->status == 'di pickup oleh kurir')
                        <button class="btn btn-success disabled w-100"  disabled>Telah Di Pickup</button>
                    @endif
                </div>
            </div>
            </div>

        </div>

    @endforeach
@endsection
