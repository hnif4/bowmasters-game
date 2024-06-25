<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class VideosController extends Controller
{
    public function index ()
    {
        //mengambil data dari tabel
        $webvideos = DB::table('webvideos')->get();

        //mengirim data ke view
        return view ('Vvideos',['webvideos' => $webvideos]);
    } 

    public function tambah(Request $request)
    {
    	DB::table('webvideos')->insert([
			'kd_videos' => $request->kd_videos,
			'judul_videos' => $request->judul_videos,
            'gambar_videos' => $request->gambar_videos,
            'link_videos' => $request->link_videos,
            
		]);
		// alihkan halaman ke halaman berita
		return redirect('/webvideos');
 
    }

    public function hapus(Request $request)
    {
		$kd_videos=$request->kd_videos;
		DB::table('webvideos')->where('kd_videos',$kd_videos)->delete();

		// alihkan halaman ke halaman berita
		return redirect('/webvideos');
 
    }

    public function edit(Request $request)
    {
    	DB::table('webvideos')->where('kd_videos',$request->kd_videos)->update([
		
			'judul_videos' => $request->judul_videos,
            'gambar_videos' => $request->gambar_videos,
            'link_videos' => $request->link_videos,
          

		]);
		// alihkan halaman ke halaman berita
		return redirect('/webvideos');
 
    }

}
