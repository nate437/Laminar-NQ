<?php

require('../../conf.php');
session_start();

$uid = mysqli_real_escape_string($db_con, $_SESSION["UID"]);
$qid = mysqli_real_escape_string($db_con, $_GET["QID"]);

$queryResult = mysqli_query($db_con, "SELECT QID from Queue WHERE QID=" . $qid . " AND Owner='" . $uid . "'");
if (mysqli_num_rows($queryResult) == 0) {
  //user is leaving a queue
  $queryResult = mysqli_query($db_con, "DELETE from Member WHERE PID='" . $uid . "' AND QID = " . $qid);
  exit();
}
$queryResult = mysqli_query($db_con, "DELETE from Queue WHERE QID=" . $qid . " AND Owner='" . $uid . "'");
$queryResult = mysqli_query($db_con, "DELETE from Member WHERE QID=" . $qid);

?>
