<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WebVideosController extends Controller
{
    public function index()
    {
    	// mengambil data dari table
    	$webvideos = DB::table('webvideos')->get();
 
    	// mengirim data ke view
    	return view('Webvideos',['webvideos' => $webvideos]);
 
    }
}
