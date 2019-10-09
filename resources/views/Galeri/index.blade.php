@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center bg-info" button class="btn btn-primary">List Galeri</div> 
                <div class="card-body">
                              <div class="col text-center">
                <table class="table table-bordered">
                    <thead class ="bg-warning">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kategori Galeri Id</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Path</th>
                                <th scope="col">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>

                        @foreach ($galeri as $item)
                            <tr>
                            <td>{!! $item->id !!}</td>
                            <td>{!! $item->nama !!}</td>
                            <td>{!! $item->kategori_galeri_id !!}</td>
                            <td>{!! $item->keterangan !!}</td>
                            <td>{!! $item->path !!}</td>
                            
                            <td>
                            <a href ="{!! route('galeri.show',[$item->id]) !!}" button class="btn btn-sm btn-primary" type="button"> Hapus </button></a> 
                            <a href="{!! route('galeri.show',[$item->id]) !!}" button class="btn btn-sm btn-danger" type="button"> Lihat </td></a>

                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                    </table>
                </div>
                
            </div>
         <a href ="{!! route('galeri.create',[$item->id]) !!}" button class="btn btn-primary" type="button"> Tambah </button></td></a>
        </div>
    </div>
</div>
@endsection