<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\foto;
use App\Models\komentar;
use App\Models\Like;
use App\Models\tkeranjang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use PDO;

class BerandaController extends Controller
{
    public function index()
    {
        $data['user'] = User::where('userid', '=', Auth::user()->userid)->first();
        $data['album'] = album::with(['Foto', 'User'])->get();
        $data['foto'] = foto::with('album','user','like','komentar')->get();
        // dd($data['like']);
        return view('beranda', $data);
    }
    public function like(string $id)
    {
        // dd($id);
        $likeFoto = like::where('fotoId', '=', $id)->where('userId', '=', Auth::user()->userid)->first();
        // dd($likeFoto);
        if ($likeFoto == null) {
            $like = new like();
            $like->userId = Auth::user()->userid;
            $like->fotoId = $id;
            $like->tanggalLike = date(now());
            $like->save();
        } else {
            $hapus = like::where('fotoId', '=', $id)->where('userId', '=', Auth::user()->userid);
            $hapus->delete();
        }
        return redirect()->back();
    }
    public function lihatAlbum(string $id)
    {
        // dd($id);
        $data['user'] = User::where('userid', '=', Auth::user()->userid)->first();
        $data['albumFoto'] = foto::with('Album')->where('fotoId', '=', $id)->first();
        $data['komen'] = komentar::with('foto','user')->where('fotoId','=',$id)->get();
        return view('lihatAlbum', $data);
    }
    public function komen(Request $request)
    {
        $komentar = new komentar();
        $komentar->userId = Auth::user()->userid;
        $komentar->fotoId = $request->foto;
        $komentar->tanggalKomentar = date(now());
        $komentar->isiKomentar = $request->komentar;
        $komentar->save();
        return redirect()->back();
    }
    public function Pencarian(Request $request){
        $cari = $request->cari;
        $data['user'] = User::where('userid', '=', Auth::user()->userid)->first();
        $data['foto'] = foto::with(['album', 'User'])->where('judulFoto','like',"%$cari%")->get();
        return view('beranda',$data);
    }
    public function Pengguna(string $id){
        $data['user'] = User::where('userid','=',$id)->first();
        $data['foto'] = foto::with('Album','like','komentar')->where('userid','=',$id)->get();
        return view('profile.user',$data);
    }

    public function Laporan(){
        $user = Auth::user()->userid;
        $data['laporan'] = DB::table('laporan')->where('userid','=',$user)->get();
        $data['foto']= foto::with('like','komentar')->where('userId','=',$user)->get();
        $data['album'] = album::where('userId','=',$user)->count();
        $data['like'] = DB::table('laporan')->where('userid','=',$user)->sum('jumlahlike');
        $data['komentar'] = DB::table('laporan')->where('userid','=',$user)->sum('jumlahkomentar');
        return view('Laporan',$data);
    }
    public function hapuskomen(Request $request){
        $komentar = komentar::where('userId','=',$request->user)->where('fotoId','=',$request->foto)->where('komentarId','=',$request->komentar);
        $komentar->delete();
        return redirect()->back();
    }
    public function deleteAlbum(string $id){
        $album = album::where('albumId','=',$id);
        $album->delete();
        return redirect()->back()->with('success','Berhasil Menghapus album');
    }
    public function editKeranjang(Request $req, string $id){
        $keranjang = tkeranjang::where('id_keranjang','=',$id);
        $keranjang->update([
            'keterangan' => $req->keterangan
        ]);
        return redirect()->back();
    }
}
