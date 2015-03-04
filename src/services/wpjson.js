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