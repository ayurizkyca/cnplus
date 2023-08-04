@extends('layout.template')
@section('content')
    <section class="login d-flex">
        <div class="login-left w-50 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-7">
                    <div class="header">
                        <h1 class="text-center">Hallo, Silahkan Login</h1>
                        @include('component.pesan')
                        <form action="{{route('user.validate_login')}}" method="POST">
                            @csrf
                            <div class="login-form">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="masukkan username Anda" value="{{Session::get('username')}}">
                                <div class="error"></div>
                            </div>
                            <div class="login-form">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="masukkan password Anda" value="{{Session::get('password')}}">
                                <div class="error"></div>
                            </div>
                            <div class="login-form text-center">
                                <button name="submit" type="submit" class="daftar">Masuk</button>
                                <span class="inline">Belum punya akun? <a href="{{route('user.registration')}}" class="text-decoration-none">Register</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="login-right w-50 h-100">
            <div id="carouselExampleControlsNoTouching" class="carousel slide " data-bs-touch="false">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-interval="2000">
                        <img src="{{asset('img/slider1.png')}}" class="d-block w-100 s-img" alt="...">
                    </div>
                    <div class="carousel-item" data-interval="2000">
                        <img src="{{asset('img/slider2.png')}}" class="d-block w-100 s-img" alt="...">
                    </div>
                    <div class="carousel-item" data-interval="2000">
                        <img src="{{asset('img/slider3.png')}}" class="d-block w-100 s-img" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
@endsection