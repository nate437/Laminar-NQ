<?php
require('../../conf.php');
session_start();

$uid = mysqli_real_escape_string($db_con, $_SESSION["UID"]);
$sid = mysqli_real_escape_string($db_con, $_GET["sid"]);
require('updateToken.php');

// Get the Saved Songs list from Spotify for a Spotify User
$url = "https://api.spotify.com/v1/me/tracks?ids=" . $sid;

$SPcheck = mysqli_query($db_con, "SELECT hasSP FROM People WHERE hasSP=1 AND ID = '" . $uid . "'");
if ( mysqli_num_rows($SPcheck) == 0){
  // User Does NOT have spotify

  $UserSavedSongs = mysqli_query($db_con, "REPLACE INTO Save SID, PID VALUES ('" . $sid . "','" . $uid . "')");

} else {

  // Get the Spotify users list of saved songs
  //open connection
  $ch = curl_init();

  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
  curl_setopt($ch,CURLOPT_HTTPHEADER, array(("Authorization: Bearer " . $accessToken ), "Content-Type: application/json"));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $result = curl_exec($ch);
  curl_close($ch);

  echo $result;
}
?>
