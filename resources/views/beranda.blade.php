@extends('index')
@section('title','beranda')
@section('content')
<style>
    .details {
        position: relative;
        margin: 10px 10px 0 0;
        color: white;
        display: flex;
        justify-content: space-between;
        top: -120px;
        margin-right: 20px;
        opacity: 0;
        transition: 0.5s ease-in-out;
    }

    .title {
        background-color: white;
        color: black;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        border: none;
    }

    .info {
        color: white;
        font-weight: 500;
        font-size: 14px;
        text-shadow: 1px 1px 2px black;
    }

    .tile:hover .details {
        opacity: 1;
    }
</style>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style="margin-left: 30px;margin-right: 30px;margin-top: 10px;border-radius: 20px;">
    <div class="carousel-inner" style="border-radius: 20px;">
        <div class="carousel-item active">
            <img src="{{asset('img/FotoAlbum/FILM1.jpg')}}" class="d-block w-100 object-fit-cover" style="height: 250px;border-radius: 20px;" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('img/FotoAlbum/FILM2.jpg')}}" class="d-block w-100 object-fit-cover;" style="height: 250px;border-radius: 20px;" alt="...">
        </div>
        <div class="carousel-item">
            <img src="{{asset('img/FotoAlbum/FILM3.jpg')}}" class="d-block w-100 object-fit-cover" style="height: 250px;border-radius: 20px;" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<div class="row row-cols-1 row-cols-md-2 g-1 mt-3 ms-3" data-masonry='{"percentPosition": true }'>
    @foreach($foto as $data)
    <div class="tile" style="cursor: pointer; width: 15.5rem;height: fit-content;margin-left: 13px;">
        <a href="{{url('lihatAlbum/'.$data->fotoId)}}" style="text-decoration: none;">
            <div class="card" style="border: white;">
                <img src="{{asset('img/FotoAlbum/'.$data->lokasiFile)}}" style="border-radius: 10px;" alt="...">
                <div class="card-body" style="display: flex; justify-content: space-between;">
                    <div class="d-flex" style="font-size: 13px;"><img src="{{asset('img/FotoProfil/'.$data->user->Foto)}}" style="width: 30px;height:30px;border-radius: 50%;margin-right: 5px;" alt="">
                        <form action="{{url('User/'.$data->user->userid)}}" method="">
                            @csrf
                            <button type="submit" class="mt-1" style="background-color: white;border: none;">{{$data->user->username}}</button>
                        </form>
                    </div>
                    <p class="card-text mt-1" style="font-size:14px;">
                        @if($data->like->where('userId','=',Auth::user()->userid)->first())
                        <i class="fa-solid fa-heart" style="color:red;"></i>
                        @else
                        <i class="fa-solid fa-heart"></i>
                        @endif
                        {{$data->like->count()}}
                        <i class="fa-solid fa-comment" style="color:black;"></i>
                        {{$data->komentar->count()}}
                    </p>
                </div>

            </div>
        </a>
        <div class="details">
            <span class="info ms-2 mt-1">{{$data->album->namaAlbum}}</span>
            <form action="{{url('Like/'.$data->fotoId)}}" method="post">
                @csrf
                <button type="submit" class="title">
                    <i class="fa-regular fa-heart"></i>
                </button>
            </form>
        </div>

    </div>
    @endforeach

</div>
@endsection