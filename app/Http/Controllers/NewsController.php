<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        // mengambil data dari tabel
        $webnews = DB::table('webnews')->get();

        // mengirim data ke view
        return view('Vnews', ['webnews' => $webnews]);
    }

    public function tambah(Request $request)
    {
        DB::table('webnews')->insert([
            'kd_news' => $request->kd_news,
            'judul_news' => $request->judul_news,
            'gambar_news' => $request->gambar_news,
            'link_news' => $request->link_news,
        ]);
        // alihkan halaman ke halaman news
        return redirect('/webnews');
    }

    public function hapus(Request $request)
    {
        $kd_news = $request->kd_news;
        DB::table('webnews')->where('kd_news', $kd_news)->delete();

        // alihkan halaman ke halaman news
        return redirect('/webnews');
    }

    public function edit(Request $request)
    {
        DB::table('webnews')->where('kd_news', $request->kd_news)->update([
            'judul_news' => $request->judul_news,
            'gambar_news' => $request->gambar_news,
            'link_news' => $request->link_news,
        ]);
        // alihkan halaman ke halaman news
        return redirect('/webnews');
    }
}