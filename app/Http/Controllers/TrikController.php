<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrikController extends Controller

{
    public function index()
    {
        // mengambil data dari tabel
        $webtrik = DB::table('webtrik')->get();

        // mengirim data ke view
        return view('Vtrik', ['webtrik' => $webtrik]);
    }

    public function tambah(Request $request)
    {
        DB::table('webtrik')->insert([
            'kd_trik' => $request->kd_trik,
            'judul_trik' => $request->judul_trik,
            'gambar_trik' => $request->gambar_trik,
            'link_trik' => $request->link_trik,
        ]);
        // alihkan halaman ke halaman trik
        return redirect('/webtrik');
    }

    public function hapus(Request $request)
    {
        $kd_trik = $request->kd_trik;
        DB::table('webtrik')->where('kd_trik', $kd_trik)->delete();

        // alihkan halaman ke halaman trik
        return redirect('/webtrik');
    }

    public function edit(Request $request)
    {
        DB::table('webtrik')->where('kd_trik', $request->kd_trik)->update([
            'judul_trik' => $request->judul_trik,
            'gambar_trik' => $request->gambar_trik,
            'link_trik' => $request->link_trik,
        ]);
        // alihkan halaman ke halaman trik
        return redirect('/webtrik');
    }
}

