@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kategori Artikel</div>
                <div class="card-body">
                    <a href="{!! route('kategori_artikel.create') !!}" class="btn btn-primary">Tambah Data</a>

                    <a href="{!! route('kategori_artikel.trash') !!}" class="btn btn-danger">See delete data</a>

                </div>
                <table class="table table-bordered">
                    <thead class="bg-warning">
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nama</th>
                        <th scope="col">User_id</th>
                        <th scope="col">Create</th>
                        <th scope="col">Update</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach( $listKategoriArtikel as $item)
                        <tr>
                        <td>{!! $item->id !!}</td>
                        <td>{!! $item->nama !!}</td>
                        <td>{!! $item->users_id !!}</td>
                        <td>{!! $item->created_at->format('d/m/Y H:i:s')!!}</td>
                        <td>{!! $item->updated_at->format('d/m/Y H:i:s')!!}</td>
                        <td>
                         <a href="{!! route('kategori_artikel.show',[$item->id]) !!}" class="btn btn-sm btn-success">
                         Lihat</a>

                         <a href="{!! route('kategori_artikel.edit',[$item->id]) !!}" class="btn btn-sm btn-primary">
                         Edit</a>

                         {!! Form::open(['route' => ['kategori_artikel.destroy', $item->id],'method'=>'delete']) !!}

                         {!! Form::submit('Hapus',['class'=>'btn btn-sm btn-danger','onclick'=>"return confirm('do you want to delete this data?')"]); !!}

                         {!! Form::close() !!}
                        </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection