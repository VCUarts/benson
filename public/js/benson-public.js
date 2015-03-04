(function(){
    var app = angular.module("benson", []);
}());
// Code goes here
(function () {

    var app = angular.module("benson", ['ngSanitize']);

    var MainController = function ($scope, wpjson) {

      var onDataComplete = function(data){
        $scope.data = data;
      }

      var onError = function (response) {
        $scope.error = 'Could not fetch data because "' + response + '"';
      };

      wpjson.getData().then(onDataComplete, onError);

    };

    app.controller("MainController", ["$scope", "wpjson", MainController]);

}());
(function () {

    var wpjson = function ($http) {

        var getData = function () {
            return $http.get(wpjson_url).then(function (response) {
                return response.data;
            });
        };

        return {
            getData: getData
        };
    };

    var module = angular.module("benson");
    module.factory("wpjson", wpjson);

}());