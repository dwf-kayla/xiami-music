var App=angular.module("xiamiapp",["ngRoute"]);
App.config(["$routeProvider",function($routeProvider){
    $routeProvider.when("/categoryManager",{
        templateUrl:"tmp/category.html",
        controller:"categoryController"
    }).when("/musicManager",{
        templateUrl:"tmp/music.html",
        controller:"musicController"
    }).otherwise({
        redirectTo:"/categoryManager"
    })
}]);
/*关联一个控制器，在控制器里面去获取数据.
 * 如果这个数据在多个地方被用到，你就需要把它放在$rootScope 上面.
 * */
App.run(["$rootScope","$http",function($rootScope,$http){
    /*请求分类查询的接口*/
    $rootScope.findCategory=function(){
        $http({
            method:"get",
            url:"../api/category/findCategory.php"
        }).success(function(data){
            $rootScope.categoryList=data;
        });
    }
    $rootScope.findCategory();
}])