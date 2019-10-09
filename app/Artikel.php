<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table='artikel';

    	protected $fillable=[
    		'judul','isi','users_id','kategori_artikel_id'
    	];

    	
    	protected $casts=[
    	'delete_at'=>'datetime'
    ];

}