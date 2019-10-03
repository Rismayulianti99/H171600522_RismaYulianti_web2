<?php

namespace App\Http\Controllers;

use App\Galeri;
use Illuminate\Http\Request;
use App\KategoriGaleri;

class GaleriController extends Controller
{
    public function index(){
        
        $listGaleri=Galeri::all(); 

        return view ('galeri.index',compact('listGaleri'));
        //return view ('artikel.index'->with('data',$listArtikel);
    }

    public function show($id) {

        //$Artikel=Artikel::where('id',$id)->first();
        $Galeri=Galeri::find($id);

        return view ('galeri.show', compact('Galeri'));
        
    }

    public function create(){

        $KategoriGaleri=KategoriGaleri::pluck('nama','id');
        
        return view('galeri.create', compact('Kategorigaleri'));
    }

    public function store(Request $request){

        $input= $request->all();

        Galeri::create($input);

        return redirect(route('galeri.index'));
    }
}