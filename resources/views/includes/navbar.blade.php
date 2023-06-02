<div class="container">
    <nav class="row navbar navbar-expand-lg navbar-light bg-white">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="{{ url('frontend/images/LOGO.png') }}" alt="Logo Tricky">
            </a>

            <button class="navbar-toggler navbar-toggler-right"
            type="button"
            data-toggle="collapse"
            data-target="#navb"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md-2 ">
                        <a href="{{ route('home') }}" class="nav-link active">
                            Home
                        </a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="#" class="nav-link">
                            Produk
                        </a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="{{ route('checkout') }}" class="nav-link">
                            Keranjang
                        </a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="#" class="nav-link">
                            Testimonial
                        </a>
                    </li>
                </ul>

                @guest
                  <!-- Mobile Button -->
                    <form action="" class="form-inline d-sm-block d-md-none" >
                        <button class="btn btn-login my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}' ">
                            Masuk
                        </button>
                    </form>

                <!-- Desktop Button -->
                    <form action="" class="form-inline my-2 my-lg-0 d-none d-md-block">
                        <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ url('login') }}' ">
                            Masuk
                        </button>
                    </form>      
                @endguest

                @auth
                  <!-- Mobile Button -->
                    <form class="form-inline d-sm-block d-md-none" action="{{url('logout')}}" method="POST" >
                        <button class="btn btn-login my-2 my-sm-0 px-4" type="submit">
                            @csrf
                            Keluar
                        </button>
                    </form>

                <!-- Desktop Button -->
                    <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}" method="POST" >
                        <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
                            @csrf
                            Keluar
                        </button>
                    </form>      
                @endauth
            </div>
    </nav>
  </div>