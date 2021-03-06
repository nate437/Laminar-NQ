<?php
require('../../conf.php');
$url = "https://accounts.spotify.com/api/token";

$token = $_GET["token"];

$fields = array(
  'grant_type' => 'authorization_code',
  'code' => $token,
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

//close connection
curl_close($ch);

?>
