<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Galeri extends Model
{
	use SoftDeletes;
	protected $table='galeri';

    	protected $fillable=[
    		'id','nama','keterangan','path','create_at','update_at','users_id','kategori_galeri_id'
    	];

    	protected $casts=[
    	'delete_at'=>'datetime'
    ];
   	
}