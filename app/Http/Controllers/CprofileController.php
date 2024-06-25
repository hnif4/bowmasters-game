<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CprofileController extends Controller
{
    public function index()
    {
        // mengambil data dari tabel
        $webprofile = DB::table('webprofile')->get();

        // mengirim data ke view
        return view('Vprofile', ['webprofile' => $webprofile]);
    }

    public function tambah(Request $request)
    {
        DB::table('webprofile')->insert([
            'kd_profile' => $request->kd_profile,
            'gambar_profile' => $request->gambar_profile,
            'link_profile' => $request->link_profile,
        ]);
        // alihkan halaman ke halaman profile
        return redirect('/webprofile');
    }

    public function hapus(Request $request)
    {
        $kd_profile = $request->kd_profile;
        DB::table('webprofile')->where('kd_profile', $kd_profile)->delete();

        // alihkan halaman ke halaman profile
        return redirect('/webprofile');
    }

    public function edit(Request $request)
    {
        DB::table('webprofile')->where('kd_profile', $request->kd_profile)->update([
            'gambar_profile' => $request->gambar_profile,
            'link_profile' => $request->link_profile,
        ]);
        // alihkan halaman ke halaman profile
        return redirect('/webprofile');
    }
}
