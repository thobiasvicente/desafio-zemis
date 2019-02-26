<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iten extends Model
{
    protected $guarded = ['id','created_at','updated_at'];
    protected $table = 'itens';

    public function user(){
        return $this->beLongsTo('App\User');
    }
}
