<?php

use App\Mail\newVipMail;
use App\Models\Pedido;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
Route::get('pedidos/{id}/sendmail',  function($id){
    $pedido = Pedido::with('cliente')->with('pedido_produto')->findOrFail($id);
    Mail::send( new newVipMail($pedido));
});


Route::get('pedidos/{id}/report',  function($id){
    $pedido = Pedido::with('cliente')->with('pedido_produto')->findOrFail($id);

     view()->share('bodyMail',['pedido' => $pedido]);
    $pdf = \PDF::loadView('bodyMail', ['pedido' => $pedido]);
    return $pdf->stream();
});
