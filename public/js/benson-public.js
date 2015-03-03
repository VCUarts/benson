(function(){
    var app = angular.module("madeby", []);
}());
// Code goes here
(function () {

    var app = angular.module("madeby", ['ngSanitize']);

    var MainController = function ($scope, wpjson) {

      var onMakersComplete = function(data){
        $scope.makers = data;
      }

      var onError = function (response) {
        $scope.error = 'Could not fetch data because "' + response + '"';
      };

      wpjson.getMakers().then(onMakersComplete, onError);

    };

    app.controller("MainController", ["$scope", "wpjson", MainController]);

}());
(function () {

    var wpjson = function ($http) {

        var getMakers = function () {
            return $http.get(madebyurl).then(function (response) {
                return response.data;
            });
        };

        return {
            getMakers: getMakers
        };
    };

    var module = angular.module("madeby");
    module.factory("wpjson", wpjson);

}());