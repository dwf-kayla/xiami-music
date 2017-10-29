<?php

            /*
                url:  url 地址
                method:"" 提交方式
                        get
                params: 参数的
                        categoryId
                        musicName
                        authorName
                        musicUrl
                        authorUrl
                repsonse 响应的数据
            */
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
            $sql="INSERT INTO music (categoryId,musicName,authorName,musicUrl,authorUrl)
            VALUES ('$_GET[categoryId]','$_GET[musicName]','$_GET[authorName]','$_GET[musicUrl]','$_GET[authorUrl]')";
            if (!mysql_query($sql,$con)){
                die('Error: ' . mysql_error());
            }
            //添加成功
            echo '{"status":"ok"}';
            //关闭跟数据库的连接
            mysql_close($con)
?>