<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebTrikController extends Controller
{
    public function index()
    {
    	// mengambil data dari table
    	$webtrik= DB::table('webtrik')->get();
 
    	// mengirim data ke view
    	return view('Webtrik',['webtrik' => $webtrik]);
 
    }
}
