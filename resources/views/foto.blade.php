@extends('index')
@section('title','test')
@section('content')
<link rel="stylesheet" href="{{asset('css/profile.css')}}">

<main>

    <div id="profile-upper">
        <div id="profile-banner-image">
            <img src="https://imagizer.imageshack.com/img921/9628/VIaL8H.jpg" alt="Banner image">
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
            <div id="u-name">{{Auth::user()->username}}</div>
            <div class="tb" id="m-btns">
                <div class="td">
                    <div class="m-btn"><span>Activity log</span></div>
                </div>
                <div class="td">
                    <div class="m-btn"><span>Privacy</span></div>
                </div>
            </div>
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
                        <div id="intro-line">{{Auth::user()->username}}</div>
                        <div id="u-occ">Saya Suka Makan dan Olahraga</div>
                        <div id="u-loc"><a href="#">Bandung</a>, <a href="#">Indonesia</a></div>
                    </div>
                </div>
                <div class="l-cnt l-mrg">
                    <div class="cnt-label">
                        <i class="l-i" id="l-i-p"></i>
                        <span>Photos</span>
                        <div class="lb-action" id="b-i"></div>
                    </div>
                    <div id="photos">
                        <div class="tb" style="display: flex;flex-wrap: wrap;margin-bottom: 15px;">
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
                <div class="m-mrg" id="p-tabs">
                    <div class="tb">
                        <div class="td">
                            <div class="tb" id="p-tabs-m " style="display: flex;justify-content: start; gap: 60px;">
                                <a href="/profile" class="btn btn-sm"><i class="fa-solid fa-blog me-1"></i><span>Postingan</span></a>
                                <a href="foto" class="btn btn-sm"><i class="fa-solid fa-image me-1"></i><span>Foto</span></a>
                                <a href="Laporan" class="btn btn-sm"><i class="fa-regular fa-message me-1"></i><span>Laporan</span></a>
                            </div>
                        </div>
                        <div class="td" id="p-tab-m"></div>
                    </div>
                </div>
                <h4 class="mb-3" style="font-weight: 600;font-size: 1.2rem;">Album</h4>
                <div class="m-mrg" id="composer" style="display: flex;flex-wrap: wrap;">
                    <a href="createFoto" class="btn" style="cursor: pointer; background:  #e9ebee; color: black; width: 110px;height: 110px; display: flex; justify-content: center;align-items: center;margin-top: 10px;">
                        <i class="fa fa-2x fa-plus"></i>
                    </a>
                    @foreach($album as $albums)
                    <a href="{{url('EditAlbum/'.$albums->albumId)}}" class="" style="display: flex; justify-content: center;align-items: center;margin-left: 10px;">
                        <img src="{{asset('img/FotoAlbum/'.$albums->Foto[0]->lokasiFile)}}" style="cursor: pointer;width: 110px;height: 110px;margin-top: 5px;border-radius: 10px;" alt="">
                    </a>
                    <a href="deleteAlbum/{{$albums->albumId}}"><i class="fa-solid fa-xmark"></i></a>

                    @endforeach
                </div>
                <div>
                    <div class="post mt-2">
                        <div class="tb">
                            <a href="#" class="td p-p-pic"><img src="{{asset('img/FotoProfil/'.$user->Foto)}}"></a>
                            <div class="td p-r-hdr">
                                <div class="p-u-info">
                                    <a href="#">aziz</a>
                                </div>
                                <div class="p-dt">

                                    <span>{{Auth::user()->created_at}}</span>
                                </div>
                            </div>
                            <div class="td p-opt"></div>
                        </div>
                        <a href="#" class="p-cnt-v  mb-1 mt-2">
                            <img style="border-radius: 10px;height: 550px;" src="{{asset('img/FotoProfil/'.$user->Foto)}}">
                        </a>
     
                    </div>
                </div>
                <div id="loading"></div>
            </div>
            <div class="td" id="r-col">
                <div id="chat-bar">
                    <div id="chat-lb"><span>Contacts</span></div>
                    <div id="cts">
                        @foreach($kontak as $users)
                        <div class="on-ct active" style="background-color: black;">
                            <a href="#"><img src="{{asset('img/FotoProfil/'.$users->Foto)}}" style="width: 100%;height: 100%;"></a>
                        </div>
                        @endforeach
                        <div class="on-ct" id="ct-sett"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="device-bar-2"><i class="fab fa-apple"></i></div>
</main>
@endsection