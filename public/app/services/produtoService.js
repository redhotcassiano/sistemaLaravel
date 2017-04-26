angular.module("sistema").factory('produtoService',function($http) {
	return {
		listar: function(){
			return $http.get('/api/produtos');
		},
		getProduto: function(id){
			return $http.get('/api/produtos/'+id);
		},
		addProduto: function(data){
			return $http.post('/api/produtos', data);
		},
		editaProduto: function(data){
			var id = data.id;
			delete data.id;
			return $http.put('/api/produtos/'+id, data);
		},
		excluiProduto: function(id){
			return $http.delete('/api/produtos/'+id);
		}

  }
});
