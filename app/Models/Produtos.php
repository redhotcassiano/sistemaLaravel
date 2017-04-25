<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Produtos extends Model
{
  protected $table = 'Produtos';

  protected $fillable = ['nome', 'descricao', 'status', 'preco'];

  public function allProdutos(){
      $result = self::all();

      if(is_null($result)){
        return false;
      }

      return $result;
  }

  public function getProduto($id){
      $result = self::find($id);

      if(is_null($result)){
        return false;
      }

      return $result;
  }

  public function saveProduto(){
      $input = Input::all();
      $produto = new Produtos();
      $produto->fill($input);

      if($produto->save()){
         return $produto;
      }else{
        return false;
      }

  }

  public function updateProduto($id){
      $input = Input::all();
      $produto  = self::find($id);
      $produto->fill($input);

      if($produto->save()){
        return $produto;
      }else{
        return false;
      }

  }

  public function delete($id){
    
  }


}
