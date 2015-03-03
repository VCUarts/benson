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