<h2>DADOS DO PEDIDO #{{ $pedido->id }}</h2>
<p><strong>Data:</strong> {{ date('d/m/Y', strtotime($pedido->data)) }}</p>
<p><strong>Observação:</strong> {{ $pedido->observacao }}</p>
<p><strong>Forma de Pagamento:</strong> {{ $pedido->pagamento }}</p>

<hr>


<h2>DADOS DO CLIENTE</h2>
<p><strong>Nome:</strong> {{ $pedido->cliente->nome }}</p>
<p><strong>CPF:</strong> {{ $pedido->cliente->cpf }}</p>
<p><strong>Sexo:</strong> {{ $pedido->cliente->sexo }}</p>
<p><strong>Email:</strong> {{ $pedido->cliente->email }}</p>

<hr>

<h2>CARRINHO</h2>
<ul>
    <?php $totalCompra = 0; ?>
    @foreach ($pedido->pedido_produto as $produto)
        <?php $totalCompra += $produto->produto_valor * $produto->quantidade; ?>
        <li>Produto: {{ $produto->produto_nome }} | Valor por und.: R$ {{ $produto->produto_valor }} | Quantidade:
            {{ $produto->quantidade }} | Valor Total: R$
            {{ number_format($produto->produto_valor * $produto->quantidade, 2) }}
        </li>
    @endforeach
</ul>
<h2><strong>Total do Pedido: </strong>R$ {{ number_format($totalCompra, 2) }}</h2>
