<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sistema CRUD</title>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
  </head>
  <body>
    <div class="col-md-12">
      <div class="row">
        <div class="tabela-produtos">
          <div class="col-md-12">
            <div class="panel panel-default panel-person">
              <div class="panel-heading">Produtos</div>
              <div class="panel-body">
                <div class="col-md-7">
                  <input type="text" class="form-control" name="pesquisar" placeholder="Pesquisar">
                </div>
                <div class="col-md-5">
                  <button type="button" name="buttonAddProduto" class="btn btn-primary btn-block" data-toggle="modal" data-target="#AddProduto" >Adicionar Produto</button>
                </div>
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <th class="col-lg-3">Nome</th>
                    <th class="col-lg-3">Descrição</th>
                    <th class="col-lg-2">Preço</th>
                    <th class="col-lg-2">Status</th>
                    <th class="col-lg-2">Opções</th>
                  </tr>
                </thead>
                <tbody ng-repeat="produto in produtos">
                  <tr>
                    <td>Test</td>
                    <td>Test</td>
                    <td>R$ 25.00</td>
                    <td>Ativo</td>
                    <td>
                      <a href="#Ver">Ver</a>
                      <a href="#Editar">Editar</a>
                      <a href="#Deletar">Deletar</a>
                    </td>


                  </tr>
                </tbody>

              </table>

              <!-- Modal -->
              <div class="modal fade" id="AddProduto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Adicionar Produto</h4>
                    </div>
                    <div class="modal-body">
                      <form class="form" action="#addProduto" method="post">
                          <input type="text" class="form-control" name="nome" value="" placeholder="Informe o Nome do Produto..."/>
                          <textarea name="descricao" class="form-control" rows="8" cols="80" placeholder="Descrição do Produto..."></textarea>
                          <div class="input-group">
                            <span class="input-group-addon">R$</span>
                            <input type="text" name="preco" class="form-control" placeholder="20.00">
                          </div>
                          <select name="categori" id="categories" class="form-control" ng-model="toursNew.idCategorie" ng-options="categoria.id as categoria.name for categoria in categorias">
                            <option value="">Selecione um Status</option>
                          </select>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary">Adicionar</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

      </div>

    </div>

    <!-- Scripts e arquivos JS -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/angular.min.js') }}"></script>
  </body>
</html>
