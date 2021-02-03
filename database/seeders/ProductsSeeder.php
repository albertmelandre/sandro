<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

#/database/seeds/DatabaseSeeder.php
class ProductsSeeder extends Seeder
{
  
  static $nomes = array('Parafuso', 'Chave de fenda', 'Bucha', 'Prego', 'Lixa', 'Estilete', 'Cola', 'Madeira', 'Ferro', 'Porca');
  static $marcas = array('Norton', 'Elgin', 'Duracell', 'Panasonic', 'LG', 'Samsung', 'Motorola', 'Zoom', 'HP');

  public function run()
  {
    
    DB::table('products')->truncate();
    
    for ($contador = 0; $contador < 200; $contador++) {
        DB::table('products')->insert([
            'nome' => self::$nomes[array_rand(self::$nomes,1)],
            'marca' => self::$marcas[array_rand(self::$marcas,1)],
            'preco' => rand(0, 1000).'.00',
            'qtd' => rand(0, 100),
            'created_at'=> date("Y-m-d H:i:s")
            
        ]);
    }


  }
}