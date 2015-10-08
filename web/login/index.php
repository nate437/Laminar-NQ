<?php
require('../conf.php');
//echo "code: " . $_GET["code"];
header('Location: ../?token=' . $_GET["code"]);

?>
