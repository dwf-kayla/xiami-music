App.controller("categoryController",["$scope","$http","$rootScope",function($scope,$http,$rootScope){

        //删除的功能.
        $scope.deleteCategory=function(categoryId){
              //发送请求，删除数据. 刷新.
              $http({
                  url:"../api/category/removeCategory.php",
                  //注意：这里的js路径是从index.html出发的。
                  method:"get",
                  params:{
                      categoryId:categoryId
                  }
              }).success(function(data){
                  //我要刷新分类的数据.
                  if(data.status=='ok'){
                      $rootScope.findCategory();
                  }
              });
        }
        //保存分类的功能.
        $scope.saveCategory=function(){
                //发送请求. 发送数据到后台，接收到结果. 更新列表
                $http({
                      url:"../api/category/addCategory.php",
                      method:"get",
                      params:{
                            categoryName:$scope.categoryName
                      }
                }).success(function(data){
                      if(data.status=='ok'){
                            //添加成功，更新列表
                            $rootScope.findCategory();

                            //我要把输入框清空
                            $scope.categoryName="";

                            //关闭窗口
                            $(".categoryCancel").click();
                      }
                })
        }
}])