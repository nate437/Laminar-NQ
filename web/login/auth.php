<?php
require('../../conf.php');
$url = "https://accounts.spotify.com/api/token";
$data = array(
  'grant_type' => 'authorization_code',
  'code' => $_get["token"],
  'redirect_uri' => 'http://laminarnq.com/login'
);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

var_dump($result);
?>
