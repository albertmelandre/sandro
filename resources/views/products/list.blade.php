@extends('layouts.app')

@section('content')
    <h1>{{'Lista de Produtos'}}</h1>
    {{ link_to_action('App\Http\Controllers\ProductsController@list', $title = 'Listar Produtos', $parameters = array(), $attributes = array()) }}
    {{ link_to_action('App\Http\Controllers\ProductsController@form', $title = 'Adicionar Produto', $parameters = array(), $attributes = array()) }}
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>
        </div><br/>
    @endif
    @if (count($products) == 0)
        <h3>Não foram encontrados resultados.</h3>
    @else
        <table>
            <tr>
                <th>{{"Nome"}}</th>
                <th>{{"Marca"}}</th>
                <th>{{"Valor"}}</th>
                <th>{{"Quantidade"}}</th>
                <th colspan="2">{{"Opções"}}</th>
            </tr>

            @foreach ($products as $product)
                <tr>
                    <td>{{$product->nome}}</td>
                    <td>{{$product->marca}}</td>
                    <td>R$ {{$product->preco}}</td>
                    <td>{{$product->qtd}}</td>
                    <td><a href='products/edit/{{$product->id}}'>{{ 'Editar'}}</a></td>
                    <td><a onclick="return confirm('{{'Você tem certeza que quer deletar?'}}')" href='products/delete/{{$product->id}}'>{{'Deletar'}}</a></td>
                </tr>
            @endforeach
        </table>
    @endif
    {{ $products->render() }}
@endsection
