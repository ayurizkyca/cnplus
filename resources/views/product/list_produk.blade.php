@extends('layout.template')
@section('content')
    <section class="list" style="margin-top: 8rem;">
        <div class="container">
            <h2 class="text-center">List Produk</h2><br>
            {{-- Search --}}
            <form class="form-inline mb-6">
                <div class="row mb-6">
                    <div class="form-group mb-2 col-8">
                        <input type="search" name="search" class="form-control" id="cari" placeholder="Cari data berdasarkan nama, cari apa?">
                    </div>
                    <div class="col-2 mb-2">
                        <button type="search" class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                    <div class="col-2">
                        <a href="{{route('product.input')}}" class="btn button float-end">Tambah Data</a><br><br>
                    </div>
                </div>
            </form><br><br>
            {{-- End Search --}}
            <div class="row mt-10">
                <div class="col-ms-8 ">
                        <table class="table table-hover table-bordered ">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Produk</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga Beli</th>
                                    <th scope="col">Harga Jual</th>
                                    <th scope="col">Status Produk</th>
                                    <th scope="col">Kelompok Produk</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataProduct as $no => $row)
                                <tr>
                                    <th>{{$no + $dataProduct->firstItem()}}</th>
                                    <td>{{$row->kode_produk}}</td>
                                    <td>{{$row->nama_produk}}</td>
                                    <td>{{$row->harga_beli}}</td>
                                    <td>{{$row->harga_jual}}</td>
                                    <td>{{$row->status_produk}}</td>
                                    <td>{{$row->kelompok_produk}}</td>
                                    <td>{{$row->stok}}</td>
                                    <td>
                                        {{-- <a href="#" class="btn btn-warning btn-sm">Edit</a> --}}
                                        <a href="{{ route('product.delete_produk', $row->id) }}" class="btn btn-danger btn-sm" Hapus onclick="return confirm('Apakah Anda Ingin Mehapus Data ini?');">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $dataProduct->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection