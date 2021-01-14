<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome', 'cpf', 'sexo', 'email'];

    public function pedido(){
        return $this->hasMany(Pedido::class);
    }

}
