<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table= "clientes";
    protected $fillable  =[
         
        'nombre',
        'documento',
        'correo',
        'dirección',
        'user_id'
    
    ];

    public $timestamps = false;

    public function anaPorter(){
        return $this->belongsTo('App\Model\User','id');
    }
}
