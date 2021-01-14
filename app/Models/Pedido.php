<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['data', 'observacao', 'pagamento'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function produto(){
        return $this->belongsToMany(Produto::class, 'pedido_produto', 'pedido_id', 'produto_id' )->withPivot('quantidade')->withTimestamps();
    }
}
