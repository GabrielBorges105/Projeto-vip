<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['cliente_id', 'data', 'observacao', 'pagamento'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function pedido_produto()
    {
        return $this->hasMany(PedidoProduto::class);
    }
    public function produto(){
        return $this->hasMany(Produto::class);

    }
}
