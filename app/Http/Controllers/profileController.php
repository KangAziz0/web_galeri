<?php

namespace App\Http\Controllers;

use App\Models\album;
use App\Models\foto;
use App\Models\tkeranjang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['user'] = User::where('userid', '=', Auth::user()->userid)->first();
        $data['foto'] = Foto::with('like','komentar')->where('userid', '=', Auth::user()->userid)->get();
        $data['kontak'] = User::all();
        // dd($data['foto']);
        return view('profile', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function foto()
    {
        $data['user'] = User::where('userid', '=', Auth::user()->userid)->first();
        $data['foto'] = Foto::where('userid', '=', Auth::user()->userid)->get();
        $data['kontak'] = User::all();
        $data['album'] = album::with(['Foto', 'User'])->where('userid', '=', Auth::user()->userid)->get();
        return view('foto', $data);
    }
    public function create()
    {
        $data['keranjang'] = tkeranjang::where('userId', '=', Auth::user()->userid)->get();
        $data['user'] = User::where('userid', '=', Auth::user()->userid)->first();
        return view('createFoto', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::where('userid', '=', Auth::user()->userid)->get();
        $request->validate([
            'foto.*' => 'required|image|mimes:jpeg,png,gif,svg',
        ]);
        if ($request->hasFile('foto')) {
            $files = $request->file('foto');
            $users = $user[0]->userid;
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $name = time();
                $extension = $file->getClientOriginalExtension();
                $newName = $name . '.' . $extension;
                $destinationPath = 'img/FotoAlbum' . '/';
                $file->move($destinationPath, $filename);

                $keranjang = tkeranjang::create([
                    'lokasiFile' => $filename,
                    'keterangan' => "",
                    'userId' => $users
                ]);
            }
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function procedureAlbum(Request $request)
    {
        // dd($request->keterangan);
        $keranjang = tkeranjang::where('userid', '=', Auth::user()->userid)->get();
        $user = User::where('userid', '=', Auth::user()->userid)->get();
        $users = $user[0]->userid;

        $album = new album();
        $album->namaAlbum = $request->album;
        $album->descripsi = $request->deskripsi;
        $album->tanggaldibuat = date(now());
        $album->userid = $users;
        $album->save();
        $cekAlbum = album::where('userid', '=', Auth::user()->userid)->latest()->first();
        foreach ($keranjang as $value) {
            $foto = new foto();
            $foto->judulFoto = $request->album;
            if ($value->keterangan == "") {
                $foto->deskripsiFoto = $request->deskripsi;
            }
            $foto->deskripsiFoto = $value->keterangan;
            $foto->tanggalunggah = date(now());
            $foto->lokasifile = $value->lokasiFile;
            $foto->albumid = $cekAlbum->albumId;
            $foto->userid = $users;
            $foto->save();
            // dd($foto);
        }
        DB::table('tkeranjang')->truncate();
        return redirect('/profile');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        if ($request->hasFile('profil')) {
            $files = $request->file('profil');
            $filename = $files->getClientOriginalName();
            $name = time();
            $extension = $files->getClientOriginalExtension();
            $newName = $name . '.' . $extension;
            $destinationPath = 'img/FotoProfil' . '/';
            $files->move($destinationPath, $filename);

            $user = User::where('userid', '=', Auth::user()->userid)->first();
            $user->update([
                'Foto' => $filename
            ]);
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = User::where('userId', '=', Auth::user()->userid);
        $user->update([
            'username' => $request->username,
            // 'password' =>bcrypt($request->password),
            'email' => $request->email,
            'nama_lengkap' =>  $request->nama_lengkap,
            'alamat' =>  $request->alamat
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteFoto(string $id)
    {
        $foto = tkeranjang::where('lokasiFile', '=', $id)->where('userId', '=', Auth::user()->userid);
        $foto->delete();
        return redirect()->back();
    }

    public function EditAlbum(string $id)
    {
        $data['album'] = album::where('albumId', '=', $id)->first();
        $data['foto'] = foto::with('album')->where('albumId', '=', $id)->get();
        $data['user'] = User::where('userid', '=', Auth::user()->userid)->first();
        return view('EditAlbum', $data);
    }
    public function tambahGambar(Request $request, string $id)
    {
        $user = User::where('userid', '=', Auth::user()->userid)->get();
        $request->validate([
            'foto.*' => 'required|image|mimes:jpeg,png,gif,svg',
        ]);
        if ($request->hasFile('foto')) {
            $files = $request->file('foto');
            $users = $user[0]->userid;
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $name = time();
                $extension = $file->getClientOriginalExtension();
                $newName = $name . '.' . $extension;
                $destinationPath = 'img/FotoAlbum' . '/';
                $file->move($destinationPath, $filename);

                $AlbumFoto = foto::create([
                    'judulfoto' => "test",
                    'deskripsifoto' => "tesat",
                    'tanggalunggah' => date(now()),
                    'lokasiFile' => $filename,
                    'albumId' => $id,
                    'userId' => $users
                ])->where('albumId', '=', $id);
            }
            return redirect()->back();
        }
    }
    public function keterangan(Request $request, string $id)
    {
        $foto = foto::where('fotoId', '=', $id);
        if ($request->keterangan == null) {
            $foto->update([
                'judulfoto' => $request->judul,
            ]);
        } else {
            $foto->update([
                'judulfoto' => $request->judul,
                'deskripsiFoto' => $request->keterangan
            ]);
        }
        return redirect()->back();
    }
    public function hapusProfile(){
        $user = User::where('userId','=',Auth::user()->userid);
        $user->update(['Foto' => ""]);
        return redirect()->back()->with('success','Berhasil Menghapus Foto Profil');
    }
}
