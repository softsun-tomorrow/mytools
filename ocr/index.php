<?php


require_once 'AipOcr.php';

// 你的 APPID AK SK
const APP_ID = '21719897';
const API_KEY = 'bTGBvpK45q5XdCyvA6M6EDoB';
const SECRET_KEY = 'qB0baKs7Swe3tG0AMFqEetr9jnMuBlEG';

$client = new AipOcr(APP_ID, API_KEY, SECRET_KEY);

$base_dir = './image';

$files = scandir($base_dir);

//$image = file_get_contents('./image/20200731223211.jpg');
// 如果有可选参数
$options = array();
$options["language_type"] = "CHN_ENG";
$options["detect_direction"] = "true";
$options["detect_language"] = "true";
//$options["probability"] = "true";

// 调用通用文字识别, 图片参数为本地图片
//$result = $client->basicGeneral($image, $options);

// 带参数调用通用文字识别（高精度版）
//$result = $client->basicAccurate($image, $options);
ini_set('memory_limit', '128M');
//ini_set('max_execution_time', '0');
set_time_limit(0);

foreach($files as $file){
    if ($file == '.' || $file == '..') {
        continue;
    }
    $words = [];
    $wordsString = '';
    if(is_file($base_dir.'/'.$file)) {
        $image = file_get_contents($base_dir.'/'.$file);
        $result = $client->basicAccurate($image, $options);
        if(!empty($result['log_id']) && !empty($result['words_result'])){
            array_map(function($item)use(&$words){
                $words[] = $item['words'];
            }, $result['words_result']);
        }
    }
//    $wordsString = implode('\r\n', $words);
//    file_put_contents('/data/www/mytools/ocr/words_result.txt', $words);
//    if(!file_exists('./result/'.$file.'.txt')) {
//        touch('./result/'.$file.'.txt');
//    }
//    $path = '/d/www/mytools/ocr/result/';
    $path = 'D:\www\mytools\ocr\result\\';
    $file = str_replace(' ', '_', $file);
    $file = $file.'.txt';
    if(!file_exists($path.$file)) {
        touch($path.$file);
    }
    file_put_contents($path . $file, $words);
}

// 带参数调用通用文字识别（含生僻字版）, 图片参数为本地图片
//$result = $client->enhancedGeneral($image, $options);

echo "<pre>";
print_r($result);exit;

?>
