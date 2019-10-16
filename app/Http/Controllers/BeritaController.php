<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;
use App\KategoriBerita;

class BeritaController extends Controller
{
    public function index(){
    	
    	$listBerita=Berita::all(); 

    	return view ('berita.index',compact('listBerita'));
    	//return view ('artikel.index'->with('data',$listArtikel);
    }

    public function show($id) {

        //$Artikel=Artikel::where('id',$id)->first();
        $Berita=Berita::find($id);

        return view ('berita.show', compact('Berita'));
        
    }

    public function create(){

        $listKategoriBerita=KategoriBerita::pluck('nama','id');
        
        return view('berita.create', compact('listKategoriBerita'));
    }

    public function store(Request $request){

        $input= $request->all();

        Berita::create($input);

        return redirect(route('berita.index'));
    }

     public function edit($id) {
        $Berita = Berita::find($id);
        $listKategoriBerita=KategoriBerita::pluck('nama','id');

        return view('berita.edit', compact('Berita','listKategoriBerita'));
    }

    public function update($id,Request $request){
      $listBerita=Berita::find($id);
      $input=$request->all();
  
      if(empty($listBerita)) {
        return redirect(route('berita.index'));
      }

      $listBerita->update($input);
      return redirect(route('berita.index'));
    }

    public function destroy($id){
        $listBerita=Berita::find($id);

        if (empty($listBerita)){
            return redirect(route ('berita.index'));
        }

        $listBerita->delete();
        return redirect(route('berita.index'));
    }

     public function trash(){
        
        $listBerita=berita::onlyTrashed()
                            ->WhereNotNull('deleted_at')
                            ->get(); 

        return view ('berita.index',compact('listBerita'));
        //return view ('kategori_artikel.index'->with('data',$listKategoriArtikel);
    }
}