<?php
//spotify api keys
$client_id = "cdfe9dcdaa6e47b1bd0c910df86ee81d";
$client_secret = "ed0c9dae46e84f759ae4d7f218d18d47";

//database connection
$db_con = mysqli_connect("localhost", "laminar", "withtheflow", "inqueue");
if (!$link) {
    echo "Uh oh, something went horribly wrong on our end. If this problem persists, email the sitemaster with this info:" . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>
