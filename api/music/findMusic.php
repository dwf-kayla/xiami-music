<?php
    //给客户端一个响应头，响应json 格式的数据.
    header('Content-Type:application/json;charset=utf-8');
    //连接数据库 得到连接
    $con = mysql_connect("127.0.0.1","root","");
    if (!$con){
        die('Could not connect: ' . mysql_error());
    }
    //连接那个数据库  itcast 数据
    mysql_select_db("xiami", $con);
    //sql 语句
    $sql="SELECT *,(SELECT categoryName FROM category c WHERE c.categoryId=m.categoryId) as categoryName FROM music AS m ORDER BY m.musicId DESC";
    //调用mysql_query 返回结果.
    $result = mysql_query($sql);
    $list = array();
   //把数据库里面返回的结果$result 遍历出来
   //放在$list 空的数据里面.
    while($row = mysql_fetch_array($result)){
        $item = array(
            'categoryName' => $row['categoryName'],
            'musicId' => $row['musicId'],
            'musicName' => $row['musicName'],
            'authorName' => $row['authorName'],
            'musicUrl' => $row['musicUrl'],
            'authorUrl' => $row['authorUrl']
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
