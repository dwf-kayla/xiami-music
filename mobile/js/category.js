App.controller("navsController",["$scope","$http",function($scope,$http){
        $http({
            url:"../api/category/findCategory.php",
            method:"get",
        }).success(function(data){
             console.log(data);
            //分类的数据.
             $scope.categoryList=data;
        })
}])

App.controller("categoryController",["$scope","$http","$routeParams",function($scope,$http,$routeParams){
        //我要根据分类的id 去查找到对应的音乐
         $http({
              method:"get",
              url:"../api/music/findMusicByCategoryId.php",
              params:{
                   categoryId:$routeParams.categoryId
              }
         }).success(function(data){
              $scope.musiclist=data;
         });
         $scope.play=function(musicUrl){
                document.querySelector("#musicId").src="../"+musicUrl;
                document.querySelector("#musicId").play();
         }
}]);
