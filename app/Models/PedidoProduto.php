<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    protected $table = "pedido_produto";
    protected $fillable = ['pedido_id', 'produto_nome', 'produto_valor', 'quantidade'];

    public function pedido()
    {
        return $this->belongTo(Pedido::class);
    }
}
