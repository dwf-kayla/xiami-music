App.controller("musicController",["$scope","$http",function($scope,$http){
            var params={
                   categoryId:"",
                   musicName:"",
                   authorName:"",
                   authorUrl:"",
                   musicUrl:""
            }

            /*查询音乐的数据*/
            $scope.findMusic=function(){
                    $http({
                        url:"../api/music/findMusic.php",
                        method:"get"
                    }).success(function(data){
                        $scope.musiclist=data;
                    });
            }
            //查找音乐的相关数据，然后绑定$scope
            $scope.findMusic();

             /*
             * 准备图片文件上传的
             * */
             $("#input_file_imgaeId").fileupload({
                    autoLoad:true,
                    done:function(data,response){
                        //给我响应了一个地址
                        var authorUrl=response.result;
                        //upload/author/dsafdsaf.jpg
                        params.authorUrl=authorUrl;
                        //预览图片.
                        //.end().show().delay(1000).animate({marginLeft:100},1000);
                        $(".imageShow img").attr("src","../"+authorUrl);
                        $(".imageShow").show().delay(1000).animate({marginLeft:100},1000);
                    }
             })
             /*
             * 准备音频文件上传的.
             * */
            $("#input_file_musicId").fileupload({
                autoLoad:true,
                done:function(data,response){
                    //给我响应了一个地址
                    var musicUrl=response.result
                    params.musicUrl=musicUrl;
                    console.log(musicUrl);
                }
            })
             //保存音乐相关的数据.
             $scope.saveMusic=function(){
                        //获取音乐所属的分类的Id
                        //音乐的名称
                        //音乐的作者
                        params.categoryId=$scope.categoryId;
                        params.musicName=$scope.musicName;
                        params.authorName=$scope.authorName;
                        //发送请求. 得到结果，关闭弹窗，清空表单，重新刷新table
                        $http({
                              url:"../api/music/addMusic.php",
                              method:"get",
                              params:params
                        }).success(function(data){
                              if(data.status=='ok'){
                                    //关闭弹窗
                                    $(".musicCancel").click();
                                    //清空表单
                                    $scope.musicName="";
                                    $scope.authorName="";
                                   $(".imageShow img").removeAttr("src")
                                    //重新刷新table
                                    $scope.findMusic();
                              }  
                        })

             }


}]);