<?php


$base_dir = './';

$files = scandir($base_dir);

$i=0;
foreach($files as $file) {
    if ($file == '.' || $file == '..' || $file == 'words_result.txt') {
        continue;
    }
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    if($ext != 'txt'){
        continue;
    }
    $file = $base_dir . '/' . $file;
//    copy($file, $file.'.rar');
//    echo $file.'.rar';


    $path = 'D:\www\mytools\ocr\result\\';
    $content = file_get_contents($file);
    file_put_contents($path . 'words_result.txt', "\r\n".$content."\r\n", FILE_APPEND);

}