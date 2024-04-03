@extends('index')
@section('title','EditAlbum')
@section('content')
<style>
    body {
        background-color: #f0f2f5;
    }
</style>
<div class="d-flex">
    <div class="" style="width: 25%;height: 100vh; background-color: white;">
        <h3 style="font-weight: 600;font-size: 1.4rem;margin-left: 40px;">Edit Album</h3>

        <form action="{{url('tambahGambar/'.$album->albumId)}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="foto[]" multiple="true" id="" class="form-control mt-5" style="width: 270px;margin-left: 35px;">
            <button type="submit" class="btn btn-sm btn-primary mt-3" style="margin-left: 60%;">Simpan Foto</button>
        </form>
        <!-- start -->
        <form action="">
            <div class="form-floating mb-3 mt-2" style="margin-left: 25px;margin-right: 25px;">
                <input type="email" class="form-control" id="floatingInput" value="{{$album->namaAlbum}}">
                <label for="floatingInput">Nama Album</label>
            </div>
            <div class="form-floating" style="margin-left: 25px;margin-right: 25px;">
                <input type="text" class="form-control" id="floatingPassword" value="{{$album->descripsi}}">
                <label for="floatingPassword">Deskripsi</label>
            </div>
        </form>
    </div>
    <div class="" style="width: 75%;height:100%;display: flex;flex-wrap: wrap; gap: 5px;margin-left: 40px;">
        @foreach($foto as $data)
        <div class="" style="width: 220px;height:250px;margin-top: 15px;margin-left: 10px;background-color: white;">
            <button type="button" class="" style="position: absolute;width: 30px;height: 30px;border-radius: 50%;" data-bs-toggle="modal" data-bs-target="#edit{{$data->fotoId}}"><i class="fa-solid fa-pen-to-square"></i></button>
            <img class="" style="width:100%;height: 100%;border-radius: 10px 10px 10px 10px;" src="{{asset('img/fotoAlbum/'.$data->lokasiFile)}}" alt="">
        </div>
        <!-- Modal -->
        <div class="modal fade" id="edit{{$data->fotoId}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Keterangan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('keteranganFoto/'.$data->fotoId)}}" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" name="judul" placeholder="Judul" value="{{$data->judulfoto}}">
                                <label for="floatingInput">Judul Foto</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingPassword" name="keterangan" placeholder="Password" value="{{$data->deskripsiFoto}}">
                                <label for="floatingPassword">Keterangan(Opsional)</label>
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
        @endforeach
        <!-- end -->
    </div>
</div>
</div>
@endsection