<?php
        /*
           我写的整个接口要对外暴露
                1:url 地址   api/addCategory.php
                2:提交方式    get
                3:接收的参数  categoryName
                4:返回的数据. {"status":"ok"} 代表成功.
        */
        //告诉客户端json 格式的数据，utf-8解决乱码.
        header('Content-Type:text/json;charset=utf-8');
        /*
            连接数据库
            账号，密码
        */
        $con = mysql_connect("127.0.0.1","root","");

        if (!$con){
            die('Could not connect: ' . mysql_error());
        }
        //连接那个数据
        mysql_select_db("xiami", $con);
        //sql 语句
        //把客户端获取到的值，往数据库里面添加
        $sql="INSERT INTO category (categoryName) VALUES ('$_GET[categoryName]')";
        if (!mysql_query($sql,$con)){
            die('Error: ' . mysql_error());
        }
        //添加成功
        echo '{"status":"ok"}';
        //关闭跟数据库的连接
        mysql_close($con)
?>