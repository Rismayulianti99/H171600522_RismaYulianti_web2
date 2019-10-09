@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info" button class="btn btn-primary">Tambah Artikel</div>
          
                <div class="card-body">                   
                    {!! Form::model($listArtikel, ['route' => ['artikel.update', $listArtikel->id],'method'=>'patch']) !!}
                        
                        @include('kategori_artikel.form')
                    
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
     </div>
@endsection