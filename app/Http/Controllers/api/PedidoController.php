<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PedidoController extends Controller
{
    public function index()
    {
        return Pedido::all();
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
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
        $pedido->produto()->sync([ $request->produtos[0] => ['quantidade'=> $request->quantidade[0] ]]);
        return response()->json($pedido, 201);
    }
    public function show($id)
    {
        return Pedido::findOrFail($id);
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
