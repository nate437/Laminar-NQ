<?php
require('../../conf.php');
session_start();
$uid = mysqli_real_escape_string($db_con, $_SESSION["UID"]);

require('updateToken.php');

$data = mysqli_query($db_con, "SELECT QID, Pass, Title as title, Photo as imgSrc, CreatedDate, (SELECT COUNT(*) FROM Member WHERE QID = Queue.QID) as participants, (SELECT Fname FROM People WHERE ID = Queue.Owner) as owner FROM Queue WHERE Owner = '" . $uid . "' ORDER BY CreatedDate DESC");

$rows = array();
while($r = mysqli_fetch_assoc($data)) {
    $rows[] = $r;
}

echo json_encode($rows);

?>
