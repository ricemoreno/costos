<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table='categoria';

    protected $primaryKey='Id';

    public $timestamps=false;


    protected $fillable =[
        'Descripcion',
        'Rubro'
    ];

    protected $guarded =[

    ];
}
