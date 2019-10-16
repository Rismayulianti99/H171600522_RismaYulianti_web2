<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengumuman extends Model
{
	use SoftDeletes;
    protected $table='Pengumuman';

    	protected $fillable=[
    		'judul','isi','users_id','kategori_pengumuman_id'
    	];

    	protected $casts=[
    	'delete_at'=>'datetime'
    ];
}

