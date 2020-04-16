var git_proyect = angular.module("git_proyect",[]);

git_proyect.controller ('git_proyect_controller', ['$scope', '$http', function ($scope,$http) {

    $scope.git_proyect =[];
    $scope.url =$("#").val();

    $scope.cargar_git_proyect = function(){
        $http.get($scope.url + "proyect/todos").then (function($request){
            $scope.git_proyect = $request.data;
        });
    };    

}]);