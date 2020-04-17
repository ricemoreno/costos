<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    protected $table='rubro';

    protected $primaryKey='Id';

    public $timestamps=false;


    protected $fillable =[
    	'Descripcion'
    ];

    protected $guarded =[

    ];
}
