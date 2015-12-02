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
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute post
$result = curl_exec($ch);
curl_close($ch);

$trunc =$result;

$resObj = json_decode($trunc);
//echo json_last_error();
//var_dump($resObj);

echo $resObj->access_token . PHP_EOL;
//header('Location: ../?code=' . $resObj->access_token);

$url = "https://api.spotify.com/v1/me";
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_HTTPHEADER, array(("Authorization: Bearer " . $resObj->access_token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$user = json_decode(curl_exec($ch));

//close connection
curl_close($ch);

echo $user->id;

session_start();
$_SESSION["UID"] = $user->id;

$expdate = date("Y-m-d H:i:s",time() + $resObj->expires_in);

echo $expdate;

$res = mysqli_query($db_con, "REPLACE INTO People (ID, Fname, hasSP, pic, SPkey, SPkeyExp, SPRefkey) VALUES
                            (" . $user->id . ",'" . $user->display_name . "',1,'" . $user->images[0]->url ."','" . $resObj->access_token . "','" . $expdate . "','" . $resObj->refresh_token . "')");

?>
