<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/beranda.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">

    <style>
        input:focus {
            border: none;
        }

        .nav-link:hover {
            color: #0B84ED;
        }

        * {
            font-family: 'Poppins';
        }

        .navbar-brand span {
            font-family: 'Pacifico';
            margin-top: 4px;
            color: #0B84ED;
        }

        .logo {
            text-decoration: none;
            color: black;
            font-size: 1.1rem;
            transition: .5s ease-in-out;
            border: none;
            background-color: white;
        }

        .logo:hover {
            color: #0B84ED;
            transition: .5s ease;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: white; box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
        <div class="container-fluid">
            <a class="navbar-brand d-flex gap-3" href="/">
                <i class="fa-solid fa-camera-retro fa-2x ms-3 d-inline-block align-text-top" style="color:  #0B84ED;" width="30" height="24"></i>
                <span>GaleriKu</span>
            </a>

            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="me-3 ms-3" method="post" action="cariFoto">
                    @csrf
                    <div class="form-white input-group rounded" style="width: 300px; background-color: #f0f2f5;">
                        <i class="fa-solid fa-magnifying-glass mt-2 ms-3 me-1"></i>
                        <input type="search" class="form-control" name="cari" style="background-color: #f0f2f5; color: black;border: none;font-family: 'Poppins';" placeholder="Cari Di GaleriKu" />
                    </div>
                </form>
                <ul class="navbar-nav ms-5 mb-2 mb-lg-0">
                    <li class="logo-nav nav-item me-5">
                        <a class="logo" href="/" id="home">Beranda</a>
                    </li>
                    <li class="logo-nav nav-item me-5">
                        <a class="logo" href="/foto" id="home">Foto</a>
                    </li>
                    <li class="logo-nav nav-item">
                        <a class="logo" href="/Laporan" id="home">Insight</a>
                    </li>
                </ul>
                <ul class="navbar-nav d-flex flex-row ms-auto me-3">
                    <li class="nav-item dropdown">
                        @if(Auth::user()->Foto == null)
                        <button class="btn justify-content-center" style="display: flex; border: none;background-color:  #f0f2f5;width: 40px;height: 40px;border-radius: 50%; " data-bs-toggle="dropdown" aria-expanded="false" ><i class="fa-solid fa-user" style="font-size: 25px;"></i></button>
                        @else
                        <button class="btn" style="border: none;" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{asset('img/FotoProfil/'.Auth::user()->Foto)}}" style="width: 40px;height: 40px;border-radius: 50%;" alt=""></button>
                        @endif
                        <div class="dropstart">
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/profile" style="color:white;background-color: black;">Lihat Profil</a>
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#logout">
                                        Keluar
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/logout')}}">
                        @csrf
                        <p>Apa Anda Ingin Logout</p>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Logout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div style="width: 100%;height: 80vh;">
        @yield('content')
    </div>




    <!-- Navbar -->
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('js/fontawesome.js')}}"></script>
    <script src="{{asset('js/masonry.pkgd.min.js')}}" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    @if($message = Session::get('gagal'))
    <script>
        Swal.fire('{{$message}}', '', 'warning')
    </script>
    @endif
    @if($message = Session::get('success'))
    <script>
        Swal.fire('{{$message}}', '', 'success')
    </script>
    @endif
</body>

</html>