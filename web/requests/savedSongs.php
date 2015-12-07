<?php
require('../../conf.php');
session_start();

$uid = mysqli_real_escape_string($db_con, $_SESSION["UID"]);
require('updateToken.php');

// Get the Saved Songs list from Spotify for a Spotify User
$url = "https://api.spotify.com/v1/me/tracks";

$SPcheck = mysqli_query($db_con, "SELECT hasSP FROM People WHERE hasSP=1 AND ID = '" . $uid . "'");
if ( mysqli_num_rows($SPcheck) == 0){
  // get list of saved songs from database
  // put into an comma seperated list
  // use curl to get list of tracks
  // change name of tracks to items

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
} else {

  // Get the Spotify users list of saved songs
  //open connection
  $ch = curl_init();

  //set the url, number of POST vars, POST data
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($ch,CURLOPT_HTTPHEADER, array("Authorization: Bearer " . $accessToken));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

  $result = curl_exec($ch);
  curl_close($ch);

  echo $result;
}
?>
