<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebProfileController extends Controller
{
    public function index()
    {
    	// mengambil data dari table
    	$webprofile = DB::table('webprofile')->get();
 
    	// mengirim data ke view
    	return view('Webprofile',['webprofile' => $webprofile]);
 
    }
}
