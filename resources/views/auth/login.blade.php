<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">

</head>

<body>
    <div class="container">
        <div class="img me-5">
            <img src="{{asset('img/login2.jpg')}}" alt="">
        </div>
        <div class="login ms-5">
            <h1>GaleriKu</h1>
            <form action="/login-proses" method="post">
                @csrf
                <div class="text-field">
                    <input type="text" name="username" required>
                    <label for="">Nama Pengguna</label>
                </div>
                <div class="text-field">
                    <input type="password" name="password" required>
                    <label for="">Kata Sandi</label>
                </div>
                <button type="submit" class="btn"> Masuk </button>
                <div class="or"> ------------- ATAU -------------</div>
                <div class="signup">
                    <span>Tidak Punya Akun ? </span> <a href="/Akun"> Buat Akun</a>
                </div>
            </form>
        </div>
    </div>
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>

    @if($message = Session::get('gagal'))
    <script>
        Swal.fire('{{$message}}', '', 'warning')
    </script>
    @endif
</body>

</html>