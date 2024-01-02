@extends('layouts.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $title }} {{ $getDataKandang->name_kandang }}</h1>
</div>
<div class="col-md-4">
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('kandang.update', $getDataKandang->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control " id="inputName"
                        value="{{ $getDataKandang->nama_kandang }}" name="nama_kandang">

                </div>
                <div class="form-group">
                    <label for="inputEmail">Muatan Kandang</label>
                    <input type="number" class="form-control" id="inputEmail"
                        value="{{ $getDataKandang->muatan_kandang }}" name="muatan_kandang">
                </div>
                <div class="form-group">
                    <label for="selectRole">Pilih Peternak</label>
                    <select class="form-select form-control-user" name="user_id">
                        <option value="{{ $getDataKandang->role_id}}">{{ $getDataKandang->User->name }}</option>
                        @foreach ($getUser as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary btn-user btn-block"  type="submit">Update</button>
            </form>

        </div>
    </div>
</div>
@endsection
