<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriGaleri;

class KategoriGaleriController extends Controller
{
    public function index(){

    	$listKategoriGaleri=KategoriGaleri::all();

    	return view ('kategori_galeri.index',compact('listKategoriGaleri'));
    	//return view (view: 'kategori_artikel.index')->with('data',$listKategoriArtikel);
	}
}
