<?php
require('../../conf.php');

if (!isset( $uid )){
  session_start();
  $uid = mysqli_real_escape_string($db_con, $_SESSION["UID"]);
}

$data = mysqli_query($db_con, "SELECT SPkey, SPRefkey FROM People WHERE SPkeyExp <= NOW() AND ID = " . $uid);

if (mysqli_num_rows($data) == 0){
  //echo "Key is valid.";
  $accessToken = mysqli_fetch_array(mysqli_query($db_con, "SELECT SPkey FROM People WHERE ID = " . $uid))["SPkey"];
}

else{

$dataArr = mysqli_fetch_array($data);

$Refkey = $dataArr["SPRefkey"];

//echo $Refkey;

$url = "https://accounts.spotify.com/api/token";

$fields = array(
  'grant_type' => 'refresh_token',
  'refresh_token' => $Refkey
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
curl_setopt($ch,CURLOPT_HTTPHEADER, array(("Authorization: Basic " . base64_encode($client_id . ":" . $client_secret))));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = json_decode(curl_exec($ch));
curl_close($ch);

$expdate = date("Y-m-d H:i:s",time() + $result->expires_in);

if (isset($result->refresh_token)){
  $Refkey = $result->refresh_token;
}

$accessToken = $result->access_token;

$res = mysqli_query($db_con, "REPLACE INTO People (ID, SPkey, SPkeyExp, SPRefkey) VALUES
                            (" . $uid . ",'" . $result->access_token . "','" . $expdate . "','" . $Refkey . "')");
}
