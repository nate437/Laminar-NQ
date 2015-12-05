<?php
require('../../conf.php');
session_start();
$uid = mysqli_real_escape_string($db_con, $_SESSION["UID"]);

require('updateToken.php');

$data = mysqli_query($db_con, "SELECT QID, Photo, CreatedDate, (SELECT COUNT(*) FROM Member WHERE QID = Queue.QID) as participants FROM Queue WHERE Owner = " . $uid . " ORDER BY CreatedDate DESC");

$rows = array();
while($r = mysqli_fetch_assoc($data)) {
    $rows[] = $r;
}

echo json_encode($rows);

?>
