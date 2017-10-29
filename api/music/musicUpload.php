<?php
//        array
//          'music' =>
//            array
//              'name' => string 'yanyuan.mp3' (length=11)
//              'type' => string 'audio/mp3' (length=9)
//              'tmp_name' => string 'C:\wamp\tmp\php52F3.tmp' (length=23)
//              'error' => int 0
//              'size' => int 4179360
          //获取到文件的名称,获取到文件的临时的存储位置
         //获取到文件的名称
         $fileName=$_FILES['music']['name'];
         //获取文件的位置
         $fileUrl=$_FILES['music']['tmp_name'];

         //往我的服务器的某个位置存放.
         //move_uploaded_file();

         //upload/music/文件的名称.mp3
         $musicUrl="upload/music/".$fileName;

         move_uploaded_file($fileUrl,"../../".$musicUrl);

        //upload/music/文件的名称.mp3
         echo $musicUrl;

?>