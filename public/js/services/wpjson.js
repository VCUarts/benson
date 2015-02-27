(function () {

    var wpjson = function ($http) {

        var getMakers = function () {
            return $http.get("http://madeby.dev/wp-json/posts?type=maker&filter[category_name]=rvaallday").then(function (response) {
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