<?php

         $fileName=$_FILES['author']['name'];
         //获取文件的位置
         $fileUrl=$_FILES['author']['tmp_name'];
         //upload/music/文件的名称.mp3
         $authorUrl="upload/author/".$fileName;
         move_uploaded_file($fileUrl,"../../".$authorUrl);
        //upload/music/文件的名称.mp3
         echo $authorUrl;

?>