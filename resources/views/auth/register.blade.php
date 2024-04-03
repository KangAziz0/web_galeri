<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>

<body class="container">
    <div class="login">
        <h1>GaleriKu</h1>
        <form action="/register" method="post">
            @csrf
            <div class="text-field">
                <input type="text" name="username" required>
                <label for="">Nama Pengguna</label>
            </div>
            <div class="text-field">
                <input type="password" name="password" required>
                <label for="">Kata Sandi</label>
            </div>
            <div class="text-field">
                <input type="email" name="email" required placeholder="email">
            </div>
            <div class="text-field">
                <input type="nama" name="nama" required>
                <label for="">Nama Lengkap</label>
            </div>
            <div class="text-field">
                <input type="alamat" name="alamat" required>
                <label for="">Alamat</label>
            </div>
            <button type="submit" class="btn"> Daftar </button>
            <div class="or"> ------------- ATAU -------------</div>
            <div class="buat">
                <span>Punya Akun ? </span> <a href="/login">Masuk</a>
            </div>
        </form>
    </div>
</body>

</html>