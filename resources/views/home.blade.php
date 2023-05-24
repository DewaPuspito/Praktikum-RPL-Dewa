@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('search')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="d-flex">
                            <input type="text" name="search" class="form-control">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>

                    </form>

                    <h2 class="text-center m-3">List Item Yang Ingin Di Refill</h2>
                    <div class="d-flex flex-wrap">
                    @foreach($data as $x)
                        <div class="card m-2" style="width: 18rem;">
                            <img src="{{asset('/photo/'.$x->photo)}}" class="card-img-top h-50" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$x->name}}</h5>
                                <p class="card-text">{{$x->description}}</p>
                                <p class="card-text">Rp {{$x->price}}</p>
                                <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#pengiriman{{$x->id}}">
                                    Detail Pengiriman
                                </button>
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

                                        <table class="table">
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>Jam</td>
                                                <td>Aksi</td>

                                            </tr>
                                            @foreach($x->jadwal->where('tanggal' , \Carbon\Carbon::today()->format('Y-m-d')) as $t)



                                                <form action="{{route('pesan' , ['id'=>$t->id])}}" method="post" class="d-flex">
                                                    @csrf
                                                    @method('post')
                                                    <tr>
                                                        <td>{{$t->tanggal}}</td>
                                                        <td>{{$t->jam}}</td>
                                                        <td>
                                                            <div class="d-flex">
                                                            <input type="number" class="form-control" name="qty" placeholder="banyaknya">
                                                            <button class="btn btn-success">Pesan</button>
                                                            </div>
                                                        </td>
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
            </div>
        </div>
    </div>
</div>
@endsection
