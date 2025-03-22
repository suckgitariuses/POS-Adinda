@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @if (!$supplier)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data supplier tidak ditemukan.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <tr>
                            <th>ID</th>
                            <td>{{ $supplier->supplier_id }}</td>
                        </tr>
                        <tr>
                            <th>Kode</th>
                            <td>{{ $supplier->supplier_kode }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $supplier->supplier_nama }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $supplier->supplier_alamat }}</td>
                        </tr>
                    </table>
                </div>
            @endif
            <a href="{{ url('supplier') }}" class="btn btn-sm btn-default mt-2">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
