<?php
// Remove a song from a Queue given a queue Id and song Id
require('../../conf.php');

session_start();
$uid = mysqli_real_escape_string($db_con, $_SESSION["UID"]);
$qid = mysqli_real_escape_string($db_con, $_GET["qid"]);
$sid = mysqli_real_escape_string($db_con, $_GET["sid"]);
require('updateToken.php');

$r = mysqli_fetch_array(mysqli_query($db_con, "SELECT Owner, SPID FROM Queue WHERE QID = " . $qid));

$uid = $r["Owner"];
require('updateToken.php');

$url = "https://api.spotify.com/v1/users/" . $r["Owner"] . "/playlists/" . $r["SPID"] . "/tracks";

$tracks = array("uri" => "spotify:track:" . $sid);
$content = array("tracks" => array($tracks));
$data = json_encode($content);
//echo $data . "<br>";

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
curl_setopt($ch,CURLOPT_HTTPHEADER, array(("Authorization: Bearer " . $accessToken ),
("Content-Type: application/json")));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_exec($ch);
curl_close($ch);

?>
