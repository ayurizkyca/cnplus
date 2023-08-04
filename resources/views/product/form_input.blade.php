@extends('layout.template')
@section('content')
    @include('component.navbar')
    <section class="login">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-7">
                <div class="header">
                    <h1 class="text-center">Tambah Data Produk</h1>
                    @include('component.pesan')
                    {{-- @if (session('error'))
                    <button class="btn btn-danger"> {{ session('error') }}</button>
                    @endif
                    @if (session('success'))
                    <button class="btn btn-success">{{ session('success') }}</button>
                    @endif --}}
                    <a href="{{route('product.list_produk')}}" class="btn button">List Produk</a>
                    <form action="{{route('product.validate_input')}}" method="POST">
                        @csrf

                        <div class="login-form">
                            <label for="kode_produk" class="">Kode Produk</label>
                            <div class="row">
                                <div class="login-form col-11">
                                    <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="masukkan kode produk" value="{{Session::get('kode_produk')}}">
                                </div>
                                <div class="login-form col-1">
                                    <button type="search" class="btn btn-sidebar">
                                        <i class="fas fa-search fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="login-form">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="masukkan nama produk" value="{{Session::get('nama_produk')}}">
                        </div>
                        <div class="row">
                            <div class="login-form col-6">
                                <label for="harga_beli">Harga Beli</label>
                                <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="15000" value="{{Session::get('harga_beli')}}" >
                            </div>
                            <div class="login-form col-6">
                                <label for="harga_jual">Harga Jual</label>
                                <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="15000" value="{{Session::get('harga_jual')}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="login-form col-6">
                                <label for="status_produk">Status Produk</label>
                                <select class="form-select form-select-lg mb-3" id="status_produk" name="status_produk">
                                    <option selected>-Pilih-</option>
                                    <option value="Tunai">Tunai</option>
                                    <option value="Kredit">Kredit</option>
                                    <option value="Konsinyasi">Konsinyasi</option>
                                </select>
                            </div>
                            <div class="login-form col-6">
                                <label for="kelompok_produk">Kelompok Produk</label>
                                <select class="form-select form-select-lg mb-3" id="kelompok_produk" name="kelompok_produk">
                                    <option selected>-Pilih-</option>
                                    <option value="Makanan & Minuman">Makanan & Minuman</option>
                                    <option value="Peralatan & Perlengkapan">Peralatan & Perlengkapan</option>
                                    <option value="Fesyen">Fesyen</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="login-form">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" id="stok" name="stok" placeholder="20" value="{{Session::get('stok')}}">
                        </div>
                        <div class="login-form text-center">
                            <button name="submit" type="submit" class="daftar">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection