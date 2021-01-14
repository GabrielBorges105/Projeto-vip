<?php

namespace Tests\Feature;

use App\Models\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    public function testFindProdutoById()
    {
        $produto = Produto::find(1);
        $this->assertNotNull($produto);
    }
}
