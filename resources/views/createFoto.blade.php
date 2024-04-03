@extends('index')
@section('title','create')
@section('content')
<style>
    body {
        background-color: #f0f2f5;
    }

    .text-field {
        position: relative;
        margin: 10px 0;
    }

    .text-field input {
        width: 80%;
        padding: 0 5px;
        height: 40px;
        margin-left: 35px;
        font-size: 14px;
        border: 1px solid rgba(212, 209, 209, 0.912);
        background: none;
        outline: none;
        border-radius: 5px;
        margin-top: 10px;
    }

    .text-field label {
        position: absolute;
        top: 60%;
        left: 50px;
        color: #adadad;
        transform: translateY(-50%);
        font-size: 14px;
        pointer-events: none;
        transition: .5s;
    }

    .text-field span::before {
        content: "";
        position: absolute;
        top: 40px;
        left: 0;
        width: 100%;
        height: 2px;
    }

    .text-field input:focus~label,
    .text-field input:valid~label {
        top: 25%;
        color: rgb(75, 180, 248);
        font-size: 12px;
        font-weight: 600;
    }

    .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .inputfile+label {
        text-align: center;
        font-size: 1.1em;
        font-weight: 600;
        height: 30px;
        border-radius: 5px;
        color: black;
        background-color: #e9ebee;
        width: 265px;
        margin-top: 20px;
        margin-left: 40px;
        display: inline-block;
    }

    .inputfile:focus+label,
    .inputfile+label:hover {
        background-color: #f0f2f5;
    }

    .inputfile+label {
        cursor: pointer;
    }

    .inputfile:focus+label {
        outline: 1px dotted #000;
        outline: -webkit-focus-ring-color auto 5px;
    }

    .delete {
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        background-color: white;
    }

    .delete:hover {
        background-color: red;
        color: white;
    }
</style>
<div class="d-flex">
    <div class="" style="width: 25%;height: 100vh; background-color: white;">
        <h3 style="font-weight: 600;font-size: 1.4rem;margin-left: 40px;">Buat Album</h3>

        <form action="/unggah" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="foto[]" multiple="true" id="" class="form-control mt-5" style="width: 270px;margin-left: 35px;">
            <button type="submit" class="btn btn-sm btn-primary mt-3" style="margin-left: 60%;">Simpan Foto</button>
        </form>
        <!-- start -->
        <form action="album" method="post">
            @csrf
            <div class="text-field">
                <input type="text" name="album" required>
                <label for="">Nama Album</label>
            </div>
            <div class="text-field">
                <input type="text" name="deskripsi" required>
                <label for="">Descripsi</label>
            </div>
            <button type="submit" class="btn btn-primary" style="margin-left: 40px;margin-top: 60%;width: 270px;">Posting</button>
        </form>
    </div>
    <div class="" style="width: 75%;height:100%;display: flex;flex-wrap: wrap; gap: 5px;margin-left: 40px;">
        @foreach($keranjang as $data)
        <div class="" style="width: 220px;height:250px;margin-top: 15px;margin-left: 10px;background-color: white;">
            <a href="{{url($data->lokasiFile.'/destroy')}}" class="delete" style="position: absolute;width: 30px;height: 30px;border-radius: 50%;margin-left: 200px;"><i class="fa-solid fa-xmark"></i></a>
            <button type="button" class="" style="position: absolute;width: 30px;height: 30px;border-radius: 50%;top: 120px;margin-left: 200px;" data-bs-toggle="modal" data-bs-target="#edit{{$data->id_keranjang}}"><i class="fa-solid fa-pen-to-square"></i></button>
            <img class="" style="width:100%;height:100%;border-radius: 10px 10px 0 0;" src="{{asset('img/fotoAlbum/'.$data->lokasiFile)}}" alt="">
        </div>

        <!-- modal Edit -->
        <div class="modal fade" id="edit{{$data->id_keranjang}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Keterangan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{url('keteranganKeranjang/'.$data->id_keranjang)}}" method="get">
                            @csrf
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingPassword" placeholder="password" name="keterangan" value="{{$data->keterangan}}">
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