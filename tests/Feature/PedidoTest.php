<?php

namespace Tests\Feature;

use App\Models\Pedido;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PedidoTest extends TestCase
{
    public function testFindProdutoById()
    {
        $pedido = Pedido::find(1);
        $this->assertNotNull($pedido);
    }
}
