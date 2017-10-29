var App=angular.module("app",["ngRoute"]);

App.config(["$routeProvider",function($routeProvider){
        $routeProvider.when("/category/:categoryId",{
                templateUrl:"tmp/musiclist.html",
                controller:"categoryController"
        });
}])