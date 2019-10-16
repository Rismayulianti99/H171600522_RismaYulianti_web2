<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;
use App\KategoriArtikel;

class ArtikelController extends Controller
{
    public function index(){
        
        $listArtikel=Artikel::all(); 

        return view ('artikel.index',compact('listArtikel'));
        //return view ('artikel.index'->with('data',$listArtikel);
    }

    public function show($id) {

        //$Artikel=Artikel::where('id',$id)->first();
        $Artikel=Artikel::find($id);

        return view ('Artikel.show', compact('Artikel'));
        
    }

    public function create(){

        $listKategoriArtikel=KategoriArtikel::pluck('nama','id');
        
        return view('artikel.create', compact('listKategoriArtikel'));
    }

    public function store(Request $request){

        $input= $request->all();

        Artikel::create($input);

        return redirect(route('artikel.index'));
    }

     public function edit($id) {
        $Artikel = Artikel::find($id);
        $listKategoriArtikel=KategoriArtikel::pluck('nama','id');

        return view('artikel.edit', compact('Artikel','listKategoriArtikel'));
    }

    public function update($id,Request $request){
      $listArtikel=Artikel::find($id);
      $input=$request->all();
  
      if(empty($listArtikel)) {
        return redirect(route('artikel.index'));
      }

      $listArtikel->update($input);
      return redirect(route('artikel.index'));
    }

    public function destroy($id){
        $listArtikel=Artikel::find($id);

        if (empty($listArtikel)){
            return redirect(route('artikel.index'));
        }

        $listArtikel->delete();
        return redirect(route('artikel.index'));
    }

     public function trash(){
        
        $listArtikel=Artikel::onlyTrashed()
                            ->WhereNotNull('deleted_at')
                            ->get(); 

        return view ('artikel.index',compact('listArtikel'));
        //return view ('kategori_artikel.index'->with('data',$listKategoriArtikel);
    }
}