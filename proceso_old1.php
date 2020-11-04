<?php
ini_set('allow_url_fopen',1);
$url = "https://chaturbate.com/affiliates/api/onlinerooms/?format=json&wm=P3YWn";
$data = file_get_contents($url);
$var = 1;
$html1 = str_replace("iframe","iframe2",$data,$var);

$my_file = 'json.new';
if (file_exists($my_file))
{
    unlink($my_file);
}
file_put_contents($my_file, $html1);
//rename($my_file, "json.js");

echo 'ok';
?>