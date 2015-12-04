<?php
require('../../conf.php');

$uid = mysqli_real_escape_string($db_con, $_SESSION["UID"]);

require('../../updateToken.php');

$data = mysqli_query($db_con, "SELECT QID, Photo, Owner, CreatedDate, (SELECT COUNT(*) FROM Member WHERE QID = Queue.QID) as participants FROM Queue WHERE QID = ANY(SELECT QID FROM Member WHERE PID = " . $uid . ") ORDER BY CreatedDate DESC");

$rows = array();
while($r = mysqli_fetch_assoc($data)) {
    $rows[] = $r;
}

echo json_encode($rows);

?>
