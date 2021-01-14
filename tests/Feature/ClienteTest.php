<?php

namespace Tests\Feature;

use App\Models\Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClienteTest extends TestCase
{
    public function testFindClienteById()
    {
        $cliente = Cliente::find(1);
        $this->assertNotNull($cliente);
    }
}
