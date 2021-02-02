<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;


class ProductsController extends Controller
{

    public function form()
    {
        return view('products.form');
    }

//
    public function add(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'marca' => 'required',
            'preco' => 'required|numeric',
            'qtd' => 'required|int'
        ]);

        if(isset($request['id'])){
            $product = Product::find($request['id']);
        }else {
            $product = new Product();
        }
        $product->nome = $request->nome;
        $product->marca = $request->marca;
        $product->preco = $request->preco;
        $product->qtd = $request->qtd;

        $product->save();

        return redirect('products');

    }


    public function list()
    {
        $products = Product::paginate(20);

        return view('products.list', ['products' => $products]);
    }


    public function delete($id)
    {
        $product = Product::find($id);
        try {
            $product->delete();
        } catch (\PDOException $e) {
            return redirect()->back()->withErrors('O item não pode ser deletado no momento') ;
        }
        return redirect('products');
    }

    public function edit($id)
    {
        $products = Product::where('id', $id)->first();

        return view('products.edit', ['products' => $products]);
    }


}