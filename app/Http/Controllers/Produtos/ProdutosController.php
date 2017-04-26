<?php

namespace App\Http\Controllers\Produtos;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProdutosController extends Controller
{
  public function __construct(\App\Models\Produtos $produtos, Request $request){
      $this->produtos = $produtos;
      $this->request = $request;
  }

  public function index(){

    $result = $this->produtos->allProdutos();

    if(!$result){
      return response(['response' => 'Não foi possivel encontrar os produtos!'], 400);
    }

    return response($result, 200);
  }

  public function create()
  {
      //$data = $this->request->all();
      //return $data;
     $result = $this->produtos->saveProduto();

     if(!$result){
       return response(['response' => 'Não foi possivel adicionar o produto!'], 400);
     }

     return response($result, 200);
  }

  public function show($id)
  {
      $result = $this->produtos->getProduto($id);

      if(!$result){
        return response(['response' => 'Não foi possivel encontrar o produto!'], 400);
      }

      return response($result, 200);
  }

  public function update(Request $request, $id)
  {

    $result = $this->produtos->updateProduto($id);

    if(!$result){
      return response(['response' => 'Não foi possivel modificar o produto!'], 400);
    }

    return response($result, 200);

  }

  public function destroy($id)
  {
      $result = $this->produtos->destroyProduto($id);

      if(!$result){
        return response(['response' => 'Não foi possivel excluir o produto!'], 400);
      }

      return response($result, 200);

  }

}
