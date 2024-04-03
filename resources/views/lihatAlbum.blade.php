@extends('index')
@section('title','LihatAlbum')
@section('content')
<link rel="stylesheet" href="{{asset('css/comment.css')}}">
<div class="d-flex">
    <div class="mt-4 ms-4" style="width: 55%; border-radius: 10px 0 0 10px;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
        <div id="myCarousel" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('img/FotoAlbum/'.$albumFoto->lokasiFile)}}" class="d-block w-100 " style="border-radius: 10px 0 0 10px;height:536px;" alt="...">
                </div>
            </div>
        </div>
    </div>
    <div class=" mt-4 me-4 comment-wrapper" style="width: 45%;height: 60%; background-color: white;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; border-radius: 0 10px 10px 0;">
        <div class="container">
            <div class="deskripsi">
                <h4>Judul : {{$albumFoto->judulfoto}}</h4>
                <p>deksripsi : {{$albumFoto->deskripsiFoto}}</p>
            </div>
            <div class="be-comment-block" style=" scroll-behavior: smooth;height: 300px;overflow-y: scroll;">
                <h1 class="comments-title">Comments ({{$komen->count()}})</h1>
                @foreach($komen->sortByDesc('created_at') as $komens)
                <div class="be-comment">
                    <div class="be-img-comment">
                        <a href="blog-detail-2.html">
                            <img src="{{asset('img/FotoProfil/'.$komens->user->Foto)}}" alt="" class="be-ava-comment">
                        </a>
                    </div>
                    <div class="be-comment-content">
                        <span class="be-comment-name mt-2">
                            <a href="blog-detail-2.html" style="text-decoration: none;">{{$komens->user->username}}</a>
                        </span>
                        <span class="be-comment-time">
                            <i class="fa fa-clock-o"></i>
                            {{$komens->tanggalKomentar}}
                        </span>
                        <p class="be-comment-text">
                            {{$komens->isiKomentar}}
                        </p>
                        @if($komens->userId == Auth::user()->userid || $komens->foto->userId == Auth::user()->userid)
                        <form action="/hapuskomen" method="post" class="d-flex justify-content-end">
                            @csrf
                            <input type="text" value="{{$komens->fotoId}}" hidden name="foto">
                            <input type="text" value="{{$komens->userId}}" hidden name="user">
                            <input type="text" value="{{$komens->komentarId}}" hidden name="komentar">
                            <button type="submit" style="text-decoration: none;font-size: 20px; background-color: white;border: none;"><i class="fa-solid fa-circle-xmark"></i></button>
                        </form>
                        @endif
                    </div>

                </div>
                @endforeach
            </div>
            <form method="post" action="/komen" style="margin-left: 80px; margin-right: 70px;margin-bottom: 10px;">
                @csrf
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a comment here" required name="komentar" id="floatingTextarea2" style="height: 100px ;"></textarea>
                    <label for="floatingTextarea2">Comments</label>
                </div>
                <div class="form-floating" hidden>
                    <input class="form-control" placeholder="Leave a comment here" name="foto" value="{{$albumFoto->fotoId}}" id="floatingTextarea2" style="height: 100px"></input>
                </div>
                <button type="submit" onclick="this.disabled=true;this.form.submit();" style="width:30px;height: 30px; position: absolute; right: 70px;bottom: 100px;border-radius: 50%;background-color:  #0B84ED;color: white;border: none;"><i class="fa-solid fa-paper-plane"></i></button>
            </form>
        </div>
    </div>
</div>
@endsection