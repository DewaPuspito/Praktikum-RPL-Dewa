@extends('layouts.app')
@section('content')


    <div class="container p-5">
        <div class="card p-3">
        <nav>
            <div class="nav nav-pills nav-fill nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active bg" id="Item" data-bs-toggle="tab" data-bs-target="#item" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Item</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#dipesan" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Dipesan</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#pickup" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Pickup</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#diterima" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Diterima</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="item" role="tabpanel" aria-labelledby="Item">
                <div class="d-flex justify-content-between p-3">
                    <h2>Item</h2>
                    <a href="{{route('admin.additem')}}" class="btn btn-success " > + Tambah Item</a>

                </div>

                <div class="d-flex flex-wrap ">
                    @foreach($item as $x)
                        <div class="card m-2" style="width: 18rem;">
                            <img src="{{asset('/photo/'.$x->photo)}}" class="card-img-top h-50" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$x->name}}</h5>
                                <p class="card-text">{{$x->description}}</p>
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#pengiriman{{$x->id}}">
                                 Detail Pengiriman
                                </button>
                                <div class="d-flex">
                                 <a href="{{route('admin.updateitem' , ['id'=>$x->id])}}" class="btn btn-warning w-50 m-2">Update</a>
                                    <a href="{{route('admin.deleteitem' , ['id'=>$x->id])}}" class="btn btn-danger w-50 m-2" >Delete</a>
                                </div>
                            </div>
                        </div>




                        <!-- Modal -->
                        <div class="modal modal-lg fade" id="pengiriman{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex justify-content-between align-items-baseline">
                                            <h5 class="text-center">Jadwal Pengiriman</h5>

                                        </div>
                                        <form action="{{route('admin.addjadwal' , ['id'=>$x->id])}}" method="post" class="d-flex">
                                            @csrf
                                            @method('post')
                                            <input type="date" class="form-control" name="tanggal">
                                            <input type="time" class="form-control" name="jam">
                                            <button type="submit" href="" class="btn btn-success">+ Tambah Jadwal</button>
                                        </form>

                                        <table class="table">
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>Jam</td>
                                                <td>Aksi</td>
                                                <td>Tanggal Baru</td>
                                                <td>Jam baru</td>
                                                <td>Submit Update</td>
                                            </tr>
                                            @foreach($x->jadwal as $t)

                                                <form action="{{route('admin.updatejadwal' , ['id'=>$t->id])}}" method="post" class="d-flex">
                                                    @csrf
                                                    @method('post')
                                                <tr>
                                                    <td>{{$t->tanggal}}</td>
                                                    <td>{{$t->jam}}</td>
                                                    <td><a href="{{route('admin.deletejadwal' , ['id'=>$t->id])}}" class="btn btn-danger"> Delete</a></td>
                                                    <td>
                                                            <input type="date" class="form-control" name="tanggal">
                                                    </td>

                                                    <td> <input type="time" class="form-control" name="jam"></td>
                                                    <td>     <button type="submit" href="" class="btn btn-warning text-white">+ Ubah Jadwal</button></td>
                                                </tr>
                                                </form>
                                            @endforeach

                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="dipesan" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="d-flex flex-wrap">
                @foreach($dipesan as $x)
                    <div class="card m-2" style="width: 18rem;">
                        <img src="{{asset('/photo/'.$x->jadwal->item->photo)}}" class="card-img-top h-50" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$x->jadwal->item->name}}</h5>
                            <h5 class="card-title">{{$x->jumlah}}</h5>
                            <h5 class="card-title">Nama Pemesan : {{$x->pemesan->name}}</h5>
                            <h5 class="card-title">Alamat : {{$x->pemesan->alamat}}</h5>
                            <form action="{{route('admin.confirm' , ['id'=>$x->id])}}" method="post">
                                @csrf
                                @method('post')
                            <div class="d-flex">
                                <select class="form-select" name="kurir_id" aria-label="Default select example">
                                    <option selected>List Kurir</option>
                                    @foreach(\App\Models\User::all()->where('role','kurir') as $kur)
                                    <option value="{{$kur->id}}">{{$kur->name}}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-success">Tugaskan Kurir</button>
                            </div>
                            </form>
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
                                        <button class="btn btn-success disabled"  disabled>Di Pick Up Oleh Kurir</button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="diterima" role="tabpanel" aria-labelledby="nav-contact-tab">
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
                            <a class="btn btn-success disabled w-100" href="{{route('terima' , ['id'=>$x->id])}}"  >Di Terima</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
@endsection
