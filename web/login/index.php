<?php
require('../../conf.php');

$url = "https://accounts.spotify.com/api/token";

$fields = array(
  'grant_type' => 'authorization_code',
  'code' => $_GET["code"],
  'client_id' => $client_id,
  'client_secret' => $client_secret,
  'redirect_uri' => 'http://laminarnq.com/login'
);

$fields_string = "";

foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);
echo $result;

$resObj = json_decode(substr($result,0,-1));
echo $resObj->access_token;
//header('Location: ../?code=' . $resObj->access_token);

//close connection
curl_close($ch);

?>
