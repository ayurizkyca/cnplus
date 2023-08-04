@extends('layout.template')
@section('content')
    @include('component.navbar')
    <section>
        <br><br><br><br><br><br>
        <div class="row justify-content-center align-items-center h-100 mt-100">
            <div class="col-7">
                <div class="header">
                    @include('component.pesan')
                    @guest
                        <h1>Silahkan Masuk/Daftar</h1>
                    @else
                        <h1>Selamat Datang, {{$username}}</h1>
                    @endguest
                </div>
            </div>
        </div>
    </section>
@endsection