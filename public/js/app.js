(function(){
    var app = angular.module("madeby", ["ngRoute"]);

    app.config(function( $routeProvider ){
        $routeProvider
            .when("/main", {
                templateUrl: "src/templates/main.html",
                controller: "MainController"
            })
            .otherwise({redirectTo:"/main"});
    });

}());