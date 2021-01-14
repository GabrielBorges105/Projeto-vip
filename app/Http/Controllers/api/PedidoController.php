<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PedidoController extends Controller
{
    public function index()
    {
        $pedido =  Pedido::with('cliente')->with('pedido_produto')->get();
        return $pedido;
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cliente_id' => 'required',
            'data' => 'required',
            'pagamento' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message'   => 'Validation Failed',
                'errors'    => $validator->errors()->all()
            ], 422);
        }
        $pedido = Pedido::create($request->all());
        foreach ($request->produtos as $key => $produto) {
            $dadosProduto = Produto::findOrFail($produto);
            // Vale ressaltar que quando não for informada a quantidade de produtos, automaticamente será colocado 1 como quantidade.
            $campos = ['pedido_id' => $pedido->id, 'produto_nome' => $dadosProduto->nome,'produto_valor' => $dadosProduto->valor, 'quantidade' => isset($request->quantidades[$key]) ? $request->quantidades[$key] : 1];
            $pedido->pedido_produto()->create($campos);
        }
        return response()->json($pedido, 201);
    }
    public function show($id)
    {
        //retornando pedido  com todos os produtos
        return Pedido::with('cliente')->with('pedido_produto')->findOrFail($id);
    }
    public function update(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());
    }
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();
    }
}
