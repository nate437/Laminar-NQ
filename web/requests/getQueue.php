<?php
require('../../conf.php');
session_start();
$qid = mysqli_real_escape_string($db_con, $_GET["qid"]);
$uid = mysqli_real_escape_string($db_con, $_SESSION["UID"]);
require('updateToken.php');

//do a check to see if member here!!!

$qData = mysqli_fetch_array(mysqli_query($db_con, "SELECT Owner, SPID FROM Queue WHERE QID = " . $qid));

// Get the Songs list from Spotify for a Queue
$url = "https://api.spotify.com/v1/users/" . $qData["Owner"] . "/playlists/" . $qData["SPID"] . "/tracks";

$SPcheck = mysqli_query($db_con, "SELECT hasSP FROM People WHERE hasSP=1 AND ID = '" . $uid . "'");
if ( mysqli_num_rows($SPcheck) == 0){
  // if the user isn't a spotify user, use the owner's token.


}
else {

// Get the list of saved songs
//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url . "?fields=items(track(artists,id,duration_ms,album(!available_markets),name))");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch,CURLOPT_HTTPHEADER, array("Authorization: Bearer " . $accessToken));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//echo(curl_exec($ch));

$result = json_decode(curl_exec($ch));
curl_close($ch);

$tids="";

foreach($result->items as $item){
  $tids .= "," . $item->track->id;
}

$tids = ltrim($tids, ",");

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, "https://api.spotify.com/v1/me/tracks/contains?ids=" . $tids);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch,CURLOPT_HTTPHEADER, array("Authorization: Bearer " . $accessToken));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$savedarr = json_decode(curl_exec($ch));
curl_close($ch);

foreach($result->items as $index => $item){
  $item->track->saved = $savedarr[$index];
}

echo json_encode($result);
}


/*

$UserSavedSongs = mysqli_query($db_con, "SELECT SID FROM Save WHERE PID='" . $uid . "' ORDER BY date DESC LIMIT 50");
if (mysqli_num_rows($UserSavedSongs) == 0) {
  // Need to echo an empty object with no items
  $emptySongs = array('items' => array());
  $emptySongs = json_encode($emptySongs, JSON_FORCE_OBJECT);
  return;

} else {
  // Need to put rows into an array
  $rows = array();
  while($r = mysqli_fetch_assoc($UserSavedSongs)) {
    $rows[] = $r["SID"];
  }

  $songIdString = implode(',', $rows);
  $songIdString = "ids=" . $songIdString;

  // Get the Spotify songs based on the id's
  $url = "https://api.spotify.com/v1/tracks/?";

  $ch = curl_init();
  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url . $songIdString);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $result = json_decode(curl_exec($ch), true);
  curl_close($ch);

  $result["track"] = $result["tracks"];
  unset($result["tracks"]);
  $result = array('items' => $result);
  $result = json_encode($result);
  echo $result;
}
*/
?>
