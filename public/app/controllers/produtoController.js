angular.module("sistema").controller('produtoController', function($scope, produtoService) {

  //função para chamar os avisos do sistema;
  var mensagens = function(tipo, mens){

    if(tipo == "error"){
      $scope.error = mens;
    }

    if(tipo == "success"){
      $scope.success = mens;
    }

  }

  $scope.limparMens = function(){
    $scope.success = null;
    $scope.error = null;

    $('.close').alert('close');
  }

  //Função para Listar os Produtos;
  var listarProdutos = function(){
		produtoService.listar().then(function onSuccess(response){

			$scope.produtos = response.data;

		}, function onError(response){

			$scope.error =  response.statusText;
			$scope.produtos = [];

		});
	}

  //chama a função listar Produtos;
 	listarProdutos();

  //Opções de status;
  $scope.statusProduto = [
 		{id: 1, name: "Ativado"},
 		{id: 2, name: "Desativado"}
 	];

  //Função para Salvar o Produto;
  $scope.savarProduto = function(newProduto){

    produtoService.addProduto(newProduto).then(function onSuccess(response){

      //Fecha o modal;

      $('#AddProduto').modal('hide');

      //Limpa o scope para novos registros;
      delete $scope.newProduto;

      //Emite um aviso de sucesso;
      mensagens("success", "O Produto foi Adicionado com Sucesso");

      //Limpa a variavel do formulario;

      //Lista novamente os produtos;
      listarProdutos();

		}, function onError(response){

      mensagens("error", response.statusText);

			listarProdutos();

		});
  }

  //Função Para Buscar um Produto no DB;

  $scope.visualizarProduto = function(id){
    produtoService.getProduto(id).then(function onSuccess(response){

      $scope.visulProduto = response.data;
      //Fecha o modal;
      $('#VisualizarProduto').modal('show');

    }, function onError(response){

      $scope.error =  response.statusText;
      listarProdutos();

    });
  }

  $scope.visualEditProduto = function(id){
    produtoService.getProduto(id).then(function onSuccess(response){

      $scope.editProduto = response.data;
      //chama o modal;
      $('#EditarProduto').modal('show');

    }, function onError(response){

      $scope.error =  response.statusText;
      listarProdutos();

    });
  }


  //Função Para Atualizar os Produtos;
  $scope.atualizarProduto = function(upProduto){
    produtoService.editaProduto(upProduto).then(function onSuccess(response){

      //Emite um aviso de sucesso;
      mensagens("success", "O Produto foi Atualizado com Sucesso!");

      //Fecha o modal;
      $('#EditarProduto').modal('hide');

      //Limpa a variavel do formulario;
      upProduto = "";

      listarProdutos();

    }, function onError(response){
      mensagens("error", response.statusText);

      listarProdutos();

    });
  };

  //Função para chamar o modal para confirmação da exclusão;
  $scope.excluirProduto = function(id){
    produtoService.getProduto(id).then(function onSuccess(response){
      $scope.visulProduto = response.data;
      $scope.deletarProduto = "true";

      //chama o modal;
      $('#VisualizarProduto').modal('show');

    }, function onError(response){

      $scope.error =  response.statusText;
      listarProdutos();

    });
  }


  //Função para deletar produto;

  $scope.destroyProduto = function(id){
    produtoService.excluiProduto(id).then(function onSuccess(response){
      $scope.deletarProduto = "false";
      //Fecha o modal;
      $('#VisualizarProduto').modal('hide');

      //Emite um aviso de sucesso;
      mensagens("success", "O Produto foi Excluido com Sucesso!");

      listarProdutos();

    }, function onError(response){

      //Emite um aviso de sucesso;
      mensagens("error", response.statusText);

    });
  }


});
