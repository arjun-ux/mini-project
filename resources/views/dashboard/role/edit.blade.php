@extends('layouts.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $title }} {{ $getIdRole->name }}</h1>
</div>
<div class="col-md-4">
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="user" action="{{ route('role.update', $getIdRole->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="codeInvent"
                        value="{{ $getIdRole->name }}" name="name">
                </div>
                <button class="btn btn-primary btn-user btn-block"  type="submit">Update</button>
            </form>

        </div>
    </div>
</div>
@endsection
