var app = angular.module('main', []);
app.controller('institutos', function($scope, $http){
    $scope.institutosLista = '';
	$scope.$watch('institutosLista', function () {
		$http.get('instituto').success(function (data) {
			$scope.institutosLista = data;
		})
	})
})
