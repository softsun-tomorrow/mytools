<?php


require_once 'AipOcr.php';

// 你的 APPID AK SK
const APP_ID = '21719897';
const API_KEY = 'bTGBvpK45q5XdCyvA6M6EDoB';
const SECRET_KEY = 'qB0baKs7Swe3tG0AMFqEetr9jnMuBlEG';

$client = new AipOcr(APP_ID, API_KEY, SECRET_KEY);


$image = file_get_contents('./image/20200731223211.jpg');

// 如果有可选参数
$options = array();
$options["language_type"] = "CHN_ENG";
$options["detect_direction"] = "true";
$options["detect_language"] = "true";
//$options["probability"] = "true";

// 调用通用文字识别, 图片参数为本地图片
//$result = $client->basicGeneral($image, $options);

// 带参数调用通用文字识别（高精度版）
$result = $client->basicAccurate($image, $options);

// 带参数调用通用文字识别（含生僻字版）, 图片参数为本地图片
//$result = $client->enhancedGeneral($image, $options);

echo "<pre>";
print_r($result);exit;

?>