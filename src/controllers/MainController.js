// Code goes here
(function () {

    var app = angular.module("benson", ['ngSanitize']);

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