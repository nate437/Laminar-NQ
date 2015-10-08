<?php
require('../conf.php');

$fields = array(
  'grant_type' => 'authorization_code',
  'code' => $_get["token"],
  'redirect_uri' => 'http://laminarnq.com/login'
)

$resp =  http_post_fields("https://accounts.spotify.com/api/token", $fields);

echo $resp;
?>
