<?php

    /*
         url:"api/findCategory.php",
         method:"get"
         参数:""不需要参数就可以调用
         返回值
    */

    //给客户端一个响应头，响应json 格式的数据.
    header('Content-Type:application/json;charset=utf-8');

    //连接数据库 得到连接
    $con = mysql_connect("127.0.0.1","root","");
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }
    //连接那个数据库  itcast 数据
    mysql_select_db("xiami", $con);
    /*
         select 代表查询
         from 查询那个表
         order by 根据那个字段进行排序
         desc 代表降序.
    */
    $sql="select * from category order by categoryId desc";
    //调用mysql_query 返回结果.
    $result = mysql_query($sql);
    $list = array();
   //把数据库里面返回的结果$result 遍历出来
    while($row = mysql_fetch_array($result)){
        //转换成一个数组.
        $item = array(
            'categoryId' => $row['categoryId'],
            'categoryName' => $row['categoryName'],
        );
        //往数组里面添加一条记录.
        array_push($list,$item);
    }
    /*把数组里面的数据转换成json 格式，向客户端输出.*/
    echo json_encode(
        array(
            'rows'=>$list,
        )
    );
    mysql_close($con);
?>