var app = angular.module('main', []);
app.controller('certificado', function($scope, $http){
    var config = {headers: {'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'}};

	$scope.logout = function (url,data) {
		$http.post(url, data, config)
            .then(function (data) {
				$http.redirect('/');
            });
		}
})
