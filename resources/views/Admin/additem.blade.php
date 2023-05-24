@extends('layouts.app')

@section('content')

    <div class="container p-5">

        <h1 class="text-center">Input Nama Item</h1>
        <div class="card">
            <form action="{{route('admin.additem')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')

                <div class="form-group m-2">
                    <input type="text" name="name" required class="form-control" placeholder="Name">
                </div>
                <div class="form-group m-2">
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Description heree"></textarea>
                </div>

                <div class="form-group m-2">
                    <input type="number" name="price" required class="form-control" placeholder="Price">
                </div>

                <div class="form-group m-3">
                    <label for="">Input Image</label>
                    <input class="form-control" type="file" id="formFile" name="photo" required>
                </div>

                <div class="form-group m-3">

                    <button type="submit" class="btn btn-success w-100">Submit</button>
                </div>


            </form>
        </div>
    </div>

@endsection
