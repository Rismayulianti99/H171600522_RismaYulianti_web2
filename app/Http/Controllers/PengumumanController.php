<?php

namespace App\Http\Controllers;

use App\Pengumuman;
use Illuminate\Http\Request;
use App\KategoriPengumuman;

class PengumumanController extends Controller
{
    public function index(){
        
        $listPengumuman=Pengumuman::all(); 

        return view ('pengumuman.index',compact('listPengumuman'));
        //return view ('artikel.index'->with('data',$listArtikel);
    }

    public function show($id) {

        //$Artikel=Artikel::where('id',$id)->first();
        $Pengumuman=Pengumuman::find($id);

        return view ('pengumuman.show', compact('Pengumuman'));
        
    }

    public function create(){

        $listKategoriPengumuman=KategoriPengumuman::pluck('nama','id');
        
        return view('pengumuman.create', compact('listKategoriPengumuman'));
    }

    public function store(Request $request){

        $input= $request->all();

        Pengumuman::create($input);

        return redirect(route('pengumuman.index'));
    }

     public function edit($id) {
        $Pengumuman = Pengumuman::find($id);
        $listKategoriPengumuman=KategoriPengumuman::pluck('nama','id');

        return view('pengumuman.edit', compact('Pengumuman','listKategoriPengumuman'));
    }

    public function update($id,Request $request){
      $listPengumuman=Pengumuman::find($id);
      $input=$request->all();
  
      if(empty($listPengumuman)) {
        return redirect(route('pengumuman.index'));
      }

      $listPengumuman->update($input);
      return redirect(route('pengumuman.index'));
    }

    public function destroy($id){
        $listPengumuman=Pengumuman::find($id);

        if (empty($listPengumuman)){
            return redirect(route ('pengumuman.index'));
        }

        $listPengumuman->delete();
        return redirect(route('pengumuman.index'));
    }

     public function trash(){
        
        $listPengumuman=Pengumuman::onlyTrashed()
                            ->WhereNotNull('deleted_at')
                            ->get(); 

        return view ('pengumuman.index',compact('listPengumuman'));
        //return view ('kategori_artikel.index'->with('data',$listKategoriArtikel);
    }
}