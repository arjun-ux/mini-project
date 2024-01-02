@extends('layouts.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    <div>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"></i> Export Excel
        </a>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#kandangModal">
            <i class="fas fa-download fa-sm text-white-50"></i> Add Kandang
        </a>
    </div>

</div>
<div class="col-md-12">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kandang</th>
                            <th>Muatan Kandang</th>
                            <th>Peternak</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getKandang as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kandang }}</td>
                            <td>{{ $item->muatan_kandang }}</td>
                            <td>{{ $item->User->name ?? null }}</td>
                            <td>
                                <a class="btn btn-sm btn-warning" href="{{ route('kandang.edit', $item->id) }}">Edit</a>
                                <a class="btn btn-sm btn-danger delete-kandang" href="#" data-id="{{ $item->id }}" data-name="{{ $item->nama_kandang }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Add Modal-->
<div class="modal fade" id="kandangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form class="user" action="{{ route('kandang.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="codeInvent"
                        placeholder="Nama Kandang" name="nama_kandang">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control form-control-user" id="codeInvent"
                        placeholder="Muatan Kandang" name="muatan_kandang">
                </div>
                <div class="form-group">
                    <select class="form-select form-control-user" name="user_id">
                        <option value="#">Pilih Peternak</option>
                        @foreach ($getUser as $item)
                            <option value="{{ $item->id }}">{{ $item->name ?? 'Peternak Belum Tersedia' }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-primary btn-user btn-block"  type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
</div>

@endsection
