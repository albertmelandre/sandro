@extends('layouts.app')

@section('content')
    <h1>{{'Novo Produto'}}</h1>
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
    {{ Form::open(array("action" => "App\Http\Controllers\ProductsController@add")) }}
    {{ Form::label('nome', 'Nome', array('class'=>'control-label')) }}
    {{ Form::text('nome') }}
    <br/>
    {{ Form::label('marca', 'Marca', array('class'=>'control-label')) }}
    {{ Form::text('marca') }}
    <br/>
    {{ Form::label('preco', 'Valor', array('class'=>'control-label')) }}
    {{ Form::text('preco') }}
    <br/>
    {{ Form::label('qtd', 'Quantidade', array('class'=>'control-label')) }}<br />
    {{ Form::text('qtd') }}
    <br/>
    {{ Form::submit('Salvar', array('class' => 'btn btn-default')) }}
    {{ Form::close() }}
@endsection