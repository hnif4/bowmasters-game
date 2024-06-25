<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WebNewsController extends Controller
{
    public function index()
    {
    	// mengambil data dari table
    	$webnews = DB::table('webnews')->get();
 
    	// mengirim data ke view
    	return view('Webnews',['webnews' => $webnews]);
 
    }
}
