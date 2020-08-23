<?php


$base_dir = './';

$files = scandir($base_dir);

foreach($files as $file) {
    if ($file == '.' || $file == '..') {
        continue;
    }
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    if($ext != 'livp'){
        continue;
    }
    $file = $base_dir . '/' . $file;
    copy($file, $file.'.rar');
//    echo $file.'.rar';
}