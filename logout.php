<?php
session_start();
session_destroy();
header ('Location: /cactus-soup/main.php');

?>