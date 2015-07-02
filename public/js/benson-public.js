var ngModules = [];
if ( angular_animate ) { ngModules.push(angular_animate) };
if ( angular_paginate ) { ngModules.push(angular_paginate) };
if ( angular_sanitize ) { ngModules.push(angular_sanitize) };
if ( angular_filter ) { ngModules.push(angular_filter) };

// Code goes here
(function () {
    var app = angular.module("benson", ngModules);

    var MainController = function ($scope, wpjson) {

      var onDataComplete = function(data){
        $scope.data = data;
        $scope.spinner = false;
      }

      var onError = function (response) {
        $scope.error = 'Could not fetch data because "' + response + '"';
      };

      wpjson.getData().then(onDataComplete, onError);

      $scope.spinner = true;
      
    };

    app.controller("MainController", ["$scope", "wpjson", MainController]);

    app.config(['$compileProvider', function ($compileProvider) {
      $compileProvider.debugInfoEnabled(false);
    }]);

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