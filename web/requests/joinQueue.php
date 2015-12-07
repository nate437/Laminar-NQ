<?php
require('../../conf.php');
session_start();
$uid = mysqli_real_escape_string($db_con, $_SESSION["UID"]);
$qid = mysqli_real_escape_string($db_con, $_GET["qid"]);
$pass = mysqli_real_escape_string($db_con, $_GET["pass"]);
$res = mysqli_num_rows(mysqli_query($db_con, "SELECT QID FROM Queue WHERE QID = " . $qid . " AND Pass = '" . $pass . "'"));
if ($res == 0){
  echo "false";
  exit();
}

require('updateToken.php');
$res = mysqli_query($db_con, "INSERT INTO Member (PID, QID) VALUES ('" . $uid . "'," . $qid . ")");
?>
