<?php
require('../../conf.php');

session_start();
$uid = mysqli_real_escape_string($db_con, $_SESSION["UID"]);
$qid = mysqli_real_escape_string($db_con, $_GET["qid"]);
require('updateToken.php');

$r = mysqli_fetch_array(mysqli_query($db_con, "SELECT Owner, SPID FROM Queue WHERE QID = " . $qid));

$uid = $r["Owner"];
require('updateToken.php');

$url = "https://api.spotify.com/v1/users/" . $r["Owner"] . "/playlists/" . $r["SPID"] . "/tracks";

$fields = array(
);

$fields_string = "";

foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url . "?uris=" . $_POST["uris"]);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch,CURLOPT_HTTPHEADER, array(("Authorization: Bearer " . $accessToken )));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

echo curl_exec($ch);
curl_close($ch);

?>
