<?php
require('../../conf.php');
session_start();
$uid = mysqli_real_escape_string($db_con, $_SESSION["UID"]);
$PLName = mysqli_real_escape_string($db_con, $_POST["name"]);
$imgSrc = mysqli_real_escape_string($db_con, $_POST["pic"]);
$pass = mysqli_real_escape_string($db_con, $_POST["pass"]);
require('updateToken.php');

$SPcheck = mysqli_query($db_con, "SELECT hasSP FROM People WHERE hasSP=1 AND ID = '" . $uid . "'");

if ( mysqli_num_rows($SPcheck) == 0){
  echo "false";
  exit();
}

$url = "https://api.spotify.com/v1/users/" . $uid . "/playlists";

$fields = "{\"name\": \"" . $PLName . "\", \"public\": true}";

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch,CURLOPT_HTTPHEADER, array(("Authorization: Bearer " . $accessToken ), "Content-Type: application/json", 'Content-Length: ' . strlen($fields)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = json_decode(curl_exec($ch));
curl_close($ch);

mysqli_query($db_con, "INSERT INTO Queue (Title, QID, Owner, Photo, SPID, Pass) VALUES ('" . $PLName . "'," . rand(10000, 99999) . ",'" . $uid . "','" . $imgSrc . "','" . $result->id . "','" . $pass . "')");

?>
