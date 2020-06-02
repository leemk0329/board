<?php
require("db.php");
$sql = mysqli_connect($AD,$ID,$PW,$DB);
$select_query = "DELETE FROM comment WHERE ID={$_POST["ID"]}";
$result = mysqli_query($sql,$select_query);
header('Location:/index.php?');
?>
