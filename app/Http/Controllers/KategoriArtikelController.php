<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriArtikel;

class KategoriArtikelController extends Controller
{
    public function index(){

    	$listKategoriArtikel=KategoriArtikel::all();

    	return view ('kategori_Artikel.index',compact('listKategoriArtikel'));
    	//return view (view: 'kategori_artikel.index')->with('data',$listKategoriArtikel);
	}
	public function show($id){
		//Elequent
		//$KategoriArtikel=KategoriArtikel::where('id',$id)->first(); //select *from kategori_artikel where id=$id limit 1
		$KategoriArtikel=KategoriArtikel::find($id);

		return view('kategori_artikel.show',compact('KategoriArtikel'));
	}
}
