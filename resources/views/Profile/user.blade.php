@extends('index')
@section('title','Profile '.$user->username)
@section('content')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">
<main>

    <div id="profile-upper">
        <div id="profile-banner-image">
            <img src="{{asset('img/FotoAlbum/FILM1.jpg')}}" alt="Banner image">
        </div>
        <div id="profile-d">
            <div id="profile-pic">
                @if($user->Foto)
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="width: 180px;height: 180px;">
                    <img src="{{asset('img/FotoProfil/'.$user->Foto)}}" style="width: 180px;height: 180px;">
                </button>
                @elseif($user->Foto == "")
                <button type="button" class="btn d-flex justify-content-center align-items-center" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #f0f2f5;width: 200px;height: 200px;">
                    <i class="fa-solid fa-plus" style="font-size: 50px;"></i>
                </button>
                @endif
            </div>
            <div id="u-name">{{$user->username}}</div>
            <div id="edit-profile"></div>
        </div>
        <div id="black-grd"></div>
    </div>
    <div id="main-content">
        <div class="tb">
            <div class="td" id="l-col">
                <div class="l-cnt">
                    <div class="cnt-label">
                        <i class="l-i" id="l-i-i"></i>
                        <span>Intro</span>
                        <div class="lb-action"></div>
                    </div>
                    <div id="i-box">
                        <div id="intro-line">{{$user->username}}</div>
                        <div id="u-occ">Saya Suka Makan dan Olahraga</div>
                        <div id="u-loc"><a href="#">Bandung</a>, <a href="#">Indonesia</a></div>
                    </div>
                </div>
                <div class="l-cnt l-mrg">
                    <div class="cnt-label">
                        <i class="l-i" id="l-i-p"></i>
                        <span>Album</span>
                        <div class="lb-action" id="b-i"></div>
                    </div>
                    <div id="photos">
                        <div class="tb" style="display: flex;flex-wrap: wrap;justify-content: center;margin-bottom: 15px;">
                            @foreach($foto as $data)
                            <div class="tr" style="">
                                <div class="td"><img src="{{asset('img/FotoAlbum/'.$data->lokasiFile)}}" alt="" width="100%" height="100%"></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="td" id="m-col">
                <div class="m-mrg" id="p-tabs" style="width: 80%;">
                    <div class="tb">
                        <div class="td">
                            <div class="tb" id="p-tabs-m " style="display: flex;justify-content:start; gap: 60px;">
                                <a href="#" class="btn btn-sm"><i class="fa-solid fa-blog me-1"></i><span>Postingan</span></a>
                            </div>
                        </div>
                        <div class="td" id="p-tab-m"></div>
                    </div>
                </div>

                <div class="" style="width: 80%;">
                    @foreach($foto as $fotos)
                    <div class="post mt-2">
                        <div class="tb">
                            <a href="#" class="td p-p-pic"><img src="{{asset('img/FotoProfil/'.$user->Foto)}}"></a>
                            <div class="td p-r-hdr">
                                <div class="p-u-info">
                                    <a href="#">{{$user->username}}</a>
                                </div>
                                <div class="p-dt">
                                    <span>{{$fotos->tanggalUnggah}}</span>
                                </div>
                            </div>
                            <div class="td p-opt"></div>
                        </div>
                        <a href="#" class="p-cnt-v mb-1 mt-2">
                            <img style="border-radius: 10px;height: 550px;" src="{{asset('img/FotoAlbum/'.$fotos->lokasiFile)}}">
                        </a>
                        <div>
                            <div class="p-acts mt-2">
                                <div class="p-act like"><a href="/like/{{$fotos->fotoId}}"><i class="fa-regular fa-heart me-1"></i></a><span>{{$fotos->like->count()}}</span></div>
                                <div class="p-act comment"><a href="/lihatAlbum/{{$fotos->fotoId}}"><i class="fa-solid fa-comment me-1"></i></a><span>{{$fotos->komentar->count()}}</span></div>
                                <div class="p-act share"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- modal profil -->
    <!-- Modal -->
    <div class="modal fade" id="editProfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profil</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="editProfil" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="username" value="{{$user->username}}">
                            <label for="floatingInput">Nama Pengguna</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="Email" class="form-control" id="floatingInput" value="{{$user->email}}" name="email">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="{{$user->nama_lengkap}}" name="nama_lengkap">
                            <label for="floatingInput">Nama Lengkap</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="{{$user->alamat}}" name="alamat">
                            <label for="floatingInput">Alamat</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection