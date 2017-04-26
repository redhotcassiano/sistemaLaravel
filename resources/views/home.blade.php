<!DOCTYPE html>
<html ng-app="sistema">
  <head>
    <meta charset="utf-8">
    <title>Sistema CRUD</title>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
  </head>
  <body ng-controller="produtoController">
    <div class="col-md-12">
      <div class="row">
        <div class="tabela-produtos">
          <div class="col-md-12">
            <div class="panel panel-default panel-person">
              <div class="panel-heading">Produtos</div>
              <div class="panel-body">
                <div class="row">
                  <div class="alert alert-warning " ng-show="error != null">
                    @{{ error }}
                  </div>
                </div>
                <div class="row">
                  <div class="alert alert-success " ng-show="success != null">
                    @{{ success }}
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-7">
                    <input type="text" class="form-control" name="pesquisar" placeholder="Pesquisar" ng-model="pesquisa">
                  </div>
                  <div class="col-md-5">
                    <button type="button" name="buttonAddProduto" class="btn btn-primary btn-block" data-toggle="modal" data-target="#AddProduto" >Adicionar Produto</button>
                  </div>
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
                <tbody ng-repeat="produto in produtos | filter:pesquisa">
                  <tr>
                    <td>@{{ produto.nome }}</td>
                    <td>@{{ produto.descricao }}</td>
                    <td>R$ @{{ produto.preco }}</td>
                    <td><span ng-if="produto.status == 1">Ativo</span><span ng-if="produto.status == 2">Desativado</span></td>
                    <td>
                      <a href="#Visualizar" ng-click="visualizarProduto(produto.id)"><i class="glyphicon glyphicon-zoom-in"></i></a>
                      <a href="#Editar" ng-click="visualEditProduto(produto.id)"><i class="glyphicon glyphicon-pencil"></i></a>
                      <a href="#Deletar" ng-click="excluirProduto(produto.id)"><i class="glyphicon glyphicon-remove"></i></a>
                    </td>


                  </tr>
                </tbody>

              </table>

              <!-- Modal Add Produto -->
              <div class="modal fade" id="AddProduto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Adicionar Produto</h4>
                    </div>
                    <div class="modal-body">
                      <form name="formProduto" class="form" action="#addProduto" method="post">
                          <input type="text" class="form-control" name="nome" value="" placeholder="Informe o Nome do Produto..." ng-model="newProduto.nome" required>
                          <textarea name="descricao" class="form-control" rows="8" cols="80" placeholder="Descrição do Produto..." ng-model="newProduto.descricao" required></textarea>
                          <div class="input-group">
                            <span class="input-group-addon">R$</span>
                            <input type="number" name="preco" class="form-control" placeholder="20.00" ng-model="newProduto.preco" required>
                          </div>
                          <select name="categori" id="categories" class="form-control" ng-model="newProduto.status" ng-options="status.id as status.name for status in statusProduto" required>
                            <option value="">Selecione um Status</option>
                          </select>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" ng-click="savarProduto(newProduto)" ng-disabled="!formProduto.$valid">Adicionar</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Modal Add Produto -->

              <!-- Modal Editar Produto -->
              <div class="modal fade" id="EditarProduto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Adicionar Produto</h4>
                    </div>
                    <div class="modal-body">
                      <form name="formEditProduto" class="form" action="#addProduto" method="post">
                          <input type="text" class="form-control" name="nome" value="" placeholder="Informe o Nome do Produto..."  value="editProduto.nome"ng-model="editProduto.nome" required>
                          <textarea name="descricao" class="form-control" rows="8" cols="80" placeholder="Descrição do Produto..." ng-model="editProduto.descricao" required>@{{editProduto.descricao}}</textarea>
                          <div class="input-group">
                            <span class="input-group-addon">R$</span>
                            <input name="preco" class="form-control" placeholder="20.00" value="editProduto.preco" ng-model="editProduto.preco" required>
                          </div>
                          <select name="categori" id="categories" class="form-control" ng-model="editProduto.status" ng-options="status.id as status.name for status in statusProduto" required>
                            <option value="">Selecione um Status</option>
                            <option ng-if="editProduto.status == 1" value="@{{ editProduto.status }}" selected>Ativo</option>
                            <option ng-if="editProduto.status == 2" value="@{{ editProduto.status }}" selected>Desativado</option>
                          </select>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" ng-click="atualizarProduto(editProduto)" ng-disabled="!formEditProduto.$valid">Salvar Produto</button>

                    </div>
                  </div>
                </div>
              </div>
              <!--/ Modal Editar Produto -->

              <!-- Modal Visualizar Produto -->
              <div class="modal fade" id="VisualizarProduto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">@{{ visulProduto.nome }}</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                          <div class="descricao">
                              <h4>@{{ visulProduto.descricao }}</h4>
                          </div>
                          <div class="valor">
                            <h4>R$ @{{ visulProduto.preco }}</h4>
                          </div>
                          <div class="status">
                            <h4><span ng-show="visulProduto.status == 1">Ativado</span><span ng-show="visulProduto.status == 2">Desativado</span></h4>
                          </div>
                          <div class="modal-footer" ng-show="deletarProduto == 'true' ">
                            <button type="button" class="btn btn-primary" ng-click="destroyProduto(visulProduto.id)">Excluir Produto</button>

                          </div>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--/ Modal Visualizar Produto -->


            </div>
          </div>

        </div>

      </div>

    </div>

    <div class="footer">      
      <a href="https://github.com/redhotcassiano/sistemaLaravel">GITHUB</a>
    </div>

    <!-- Scripts e arquivos JS -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/angular.min.js') }}"></script>
    <script src="{{ url('app/app.js') }}"></script>
    <!--Carrgamento dos Serviços -->
    <script src="{{ url('app/services/produtoService.js') }}"></script>
    <!-- Carrgamento dos Controllers -->
    <script src="{{ url('app/controllers/produtoController.js') }}"></script>





  </body>
</html>
