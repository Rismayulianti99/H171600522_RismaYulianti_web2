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

        //$Galeri=Galeri::where('id',$id)->first();
        $Galeri=Galeri::find($id);

        return view ('galeri.show', compact('Galeri'));
        
    }

    public function create(){

        $listKategoriGaleri=KategoriGaleri::pluck('nama','id');
        
        return view('galeri.create', compact('listKategoriGaleri'));
    }

    public function store(Request $request){

        $input= $request->all();

        Galeri::create($input);

        return redirect(route('galeri.index'));
    }

    public function edit($id) {
        $Galeri = Galeri::find($id);
        $listKategoriGaleri=KategoriGaleri::pluck('nama','id');

        return view('galeri.edit', compact('Galeri','listKategoriGaleri'));
    }

    public function update($id,Request $request){
      $listGaleri=Galeri::find($id);
      $input=$request->all();
  
      if(empty($listGaleri)) {
        return redirect(route('galeri.index'));
      }

      $listGaleri->update($input);
      return redirect(route('galeri.index'));
    }

    public function destroy($id){
        $listGaleri=Galeri::find($id);

        if (empty($listGaleri)){
            return redirect(route ('galeri.index'));
        }

        $listGaleri->delete();
        return redirect(route('galeri.index'));
    }

      public function trash(){
        
        $listGaleri=Galeri::onlyTrashed()
                            ->WhereNotNull('deleted_at')
                            ->get(); 

        return view ('galeri.index',compact('listGaleri'));
        //return view ('kategori_artikel.index'->with('data',$listKategoriArtikel);
    }
}