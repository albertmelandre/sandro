@extends('layouts.app')

@section('content')
    <h1>{{'Editar Produto'}}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
    @endif
    {{ Form::open(array("action" => "App\Http\Controllers\ProductsController@add")) }}
    {{ Form::hidden('id', $products->id) }}
    {{ Form::label('nome', 'Nome', array('class'=>'control-label')) }}
    {{ Form::text('nome', $products->nome) }}
    <br/>
    {{ Form::label('marca', 'Marca', array('class'=>'control-label')) }}
    {{ Form::text('marca', $products->marca) }}
    <br/>
    {{ Form::label('preco', 'Valor', array('class'=>'control-label')) }}
    {{ Form::text('preco', $products->preco) }}
    <br/>
    {{ Form::label('qtd', 'Quantidade', array('class'=>'control-label')) }}<br />
    {{ Form::text('qtd', $products->qtd) }}
    <br/>
    {{ Form::submit('Salvar', array('class' => 'btn btn-default')) }}
    {{ Form::close() }}
@endsection