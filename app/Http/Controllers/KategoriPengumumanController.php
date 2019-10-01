<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriPengumuman;

class KategoriPengumumanController extends Controller
{
    public function index(){

    	$listKategoriPengumuman=KategoriPengumuman::all();

    	return view ('kategori_pengumuman.index',compact('listKategoriPengumuman'));
    	//return view (view: 'kategori_artikel.index')->with('data',$listKategoriArtikel);
	}
	public function show($id){
		//Elequent
		//$KategoriArtikel=KategoriArtikel::where('id',$id)->first(); //select *from kategori_artikel where id=$id limit 1
		$KategoriPengumuman=KategoriPengumuman::find($id);

		return view('kategori_pengumuman.show',compact('KategoriPengumuman'));
	}
}
