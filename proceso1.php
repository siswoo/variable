<?php
$url = "https://chaturbate.com/affiliates/api/onlinerooms/?format=json&wm=P3YWn";
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
$contents = curl_exec($ch);
if (curl_errno($ch)) {
  echo curl_error($ch);
  echo "\n<br />";
  $contents = '';
} else {
  curl_close($ch);
}

if (!is_string($contents) || !strlen($contents)) {
echo "Failed to get contents.";
$contents = '';
}
$data=$contents;
$var = 1;
$html1 = str_replace("iframe","iframe2",$data,$var);
$my_file = 'json.new';
if (file_exists($my_file))
{
    //unlink($my_file);
}
file_put_contents($my_file, $html1);
rename($my_file, "json.js");
//echo $html1;
echo 'ok';
?>



<?php 

/*
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
*/

?>