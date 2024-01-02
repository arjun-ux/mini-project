@extends('layouts.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $title }} {{ $getData->name }}</h1>
</div>
<div class="col-md-4">
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('user.update', $getData->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="inputName">Name</label>
                    <input type="text" class="form-control " id="inputName"
                        value="{{ $getData->name }}" name="name">

                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="text" class="form-control" id="inputEmail"
                        value="{{ $getData->email }}" name="email">
                </div>
                <div class="form-group">
                    <label for="selectRole">Pilih Role</label>
                    <select name="role_id" id="selectRole" class="form-control">
                        <option value="{{ $getData->Roles->id ?? null}}">{{ $getData->Roles->name ?? 'Pilih Role'}}</option>
                        @foreach ($getRole as $item)
                            <option value="{{ $item->id }}">{{ $item->name ?? null }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary btn-user btn-block"  type="submit">Update</button>
            </form>

        </div>
    </div>
</div>
@endsection
