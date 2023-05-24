@extends('layouts.app')
@section('content')


    <div class="container p-5">
        <div class="card p-3">
            <nav>
                <div class="nav nav-tabs nav-pills nav-fill" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#dipesan" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Dipesan</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#pickup" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Pickup</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#diterima" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Diterima</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="dipesan" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="d-flex flex-wrap">
                        @foreach($dipesan as $x)
                            <div class="card m-2" style="width: 18rem;">
                                <img src="{{asset('/photo/'.$x->jadwal->item->photo)}}" class="card-img-top h-50" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$x->jadwal->item->name}}</h5>
                                    <h5 class="card-title">{{$x->jumlah}}</h5>
                                    <h5 class="card-title">{{$x->status}}</h5>
                                    <h5 class="card-title">Alamat : {{$x->pemesan->alamat}}</h5>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="pickup" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="d-flex flex-wrap">
                        @foreach($confirm as $x)
                            <div class="card m-2" style="width: 18rem;">
                                <img src="{{asset('/photo/'.$x->jadwal->item->photo)}}" class="card-img-top h-50" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$x->jadwal->item->name}}</h5>
                                    <h5 class="card-title">{{$x->jumlah}}</h5>
                                    <h5 class="card-title">Nama Pemesan : {{$x->pemesan->name}}</h5>
                                    <h5 class="card-title">Alamat : {{$x->pemesan->alamat}}</h5>
                                    <h5 class="card-title">Nama Kurir : {{$x->kurir->name}}</h5>
                                    @if($x->status == 'confirm')
                                        <button class="btn btn-success disabled"  disabled>Menunggu Di Pick Up Oleh Kurir</button>
                                    @else
                                        <button class="btn btn-success disabled"  disabled>Di Pick Up Oleh Kurir</button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        @foreach($pickup as $x)
                            <div class="card m-2" style="width: 18rem;">
                                <img src="{{asset('/photo/'.$x->jadwal->item->photo)}}" class="card-img-top h-50" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$x->jadwal->item->name}}</h5>
                                    <h5 class="card-title">{{$x->jumlah}}</h5>
                                    <h5 class="card-title">Nama Pemesan : {{$x->pemesan->name}}</h5>
                                    <h5 class="card-title">Alamat : {{$x->pemesan->alamat}}</h5>
                                    <h5 class="card-title">Nama Kurir : {{$x->kurir->name}}</h5>
                                    @if($x->status == 'confirm')
                                        <button class="btn btn-success disabled"  disabled>Menunggu Di Pick Up Oleh Kurir</button>
                                    @else
                                        <a class="btn btn-success " href="{{route('terima' , ['id'=>$x->id])}}"  >Terima</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="diterima" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="d-flex">
                    @foreach($diantar as $x)
                    <div class="card m-2" style="width: 18rem;">
                        <img src="{{asset('/photo/'.$x->jadwal->item->photo)}}" class="card-img-top h-50" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$x->jadwal->item->name}}</h5>
                            <h5 class="card-title">{{$x->jumlah}}</h5>
                            <h5 class="card-title">Nama Pemesan : {{$x->pemesan->name}}</h5>
                            <h5 class="card-title">Alamat : {{$x->pemesan->alamat}}</h5>
                            <h5 class="card-title">Nama Kurir : {{$x->kurir->name}}</h5>
                            @if($x->status == 'confirm')
                                <button class="btn btn-success disabled"  disabled>Menunggu Di Pick Up Oleh Kurir</button>
                            @else
                                <a class="btn btn-success disabled w-100" href="{{route('terima' , ['id'=>$x->id])}}"  >Di Terima</a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
