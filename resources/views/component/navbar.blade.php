{{-- NavBar --}}
<header>
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm  fixed-top" style="background-color: #000000;">
        <div class="container">
            <a class="navbar-brand fs-5" href="#"><img src="{{asset('img/logo.png')}}" alt="logo" width="50" height="50"><b> CNPLUS</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto center">
                    <li class="nav-item fs-5">
                        <a class="nav-link {{request()->is('user/beranda') ? 'active' : ''}}" href="{{route('user.beranda')}}">Beranda</a>
                    </li>
                    <li class="nav-item fs-5">
                        <a class="nav-link {{request()->is('product/input') ? 'active' : ''}}" href="{{route('product.input')}}">Produk</a>
                    </li>
                    <li class="nav-item fs-5">
                        <a class="nav-link" href="#">Transaksi</a>
                    </li>
                    <li class="nav-item fs-5">
                        <a class="nav-link" href="#">Laporan</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="{{route('user.login')}}">Masuk</a>
                    </li>
                    <li class="nav-item fs-5">
                        <a class="nav-link" href="{{route('user.registration')}}">Daftar</a>
                    </li>
                    @else
                    <li class="nav-item fs-5">
                        <a class="nav-link" href="{{route('user.logout')}}">Keluar</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>
{{-- End Navbar --}}