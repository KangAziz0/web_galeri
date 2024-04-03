@extends('index')
@section('title','Laporan')
@section('content')
<div class="d-flex w-100 mt-2 justify-content-center" style="flex-wrap: wrap;">
    <div class="card me-2 " style="width: 20%; display: flex;align-items: center;justify-content: center;">
        <div class="card-body" style="flex-direction: column;font-size: 1.1rem;">
            <div class="ms-5"><i class="fa-solid fa-images me-2"></i>{{$album}}</div>
            <p>Jumlah Album</p>
        </div>
    </div>
    <div class="card me-2 " style="width: 20%; display: flex;align-items: center;justify-content: center;">
        <div class="card-body" style="flex-direction: column;font-size: 1.1rem;">
            <div class="ms-5"><i class="fa-solid fa-image me-2"></i>{{$foto->count()}}</div>
            <p>Jumlah Foto</p>
        </div>
    </div>
    <div class="card me-2 " style="width: 20%; display: flex;align-items: center;justify-content: center;">
        <div class="card-body" style="flex-direction: column;font-size: 1.1rem;">
            <div class="ms-4"><i class="fa-solid fa-heart me-2"></i>{{$like}}</div>
            <p>Jumlah Like</p>
        </div>
    </div>
    <div class="card me-2 " style="width: 20%; display: flex;align-items: center;justify-content: center;">
        <div class="card-body" style="flex-direction: column;font-size: 1.1rem;">
            <div class="ms-5"><i class="fa-solid fa-comments me-2"></i>{{$komentar}}</div>
            <p>Jumlah komentar</p>
        </div>
    </div>
</div>
<div style="width: 82%;margin-left: 120px;" class="mt-3">
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">No.</th>
                <th scope="col" style="width: 50%;">Album</th>
                <th scope="col">Jumlah Foto</th>
                <th scope="col">Jumlah Like</th>
                <th scope="col">Jumlah Komentar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $data)
            <?php $no = 1; ?>
            <tr>
                <th scope="row"><?= $no++ ?></th>
                <td>{{$data->NamaAlbum}}</td>
                <!-- <td><img src="{{asset('img/FotoAlbum/FILM1')}}" style="width: 40px;height: 40px;margin-right: 10px;" alt="">{{$data->NamaAlbum}}</td> -->
                <td style="text-align: center;">{{$data->jumlahfoto}}</td>
                <td style="text-align: center;">{{$data->jumlahlike}}</td>
                <td style="text-align: center;">{{$data->jumlahkomentar}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection