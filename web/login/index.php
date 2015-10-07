<?php

echo "code: " . $_GET["code"];
echo "state: " . $_GET["state"];

header("../index.html?token=" + $_GET["code"]);

?>
