<?php
require("db.php");
$sql = mysqli_connect($AD,$ID,$PW,$DB);
$select_query = "DELETE FROM comment WHERE ID={$_POST["ID"]}";
$result = mysqli_query($sql,$select_query);
echo "<script>alert('삭제완료!!'); location.href='read.php?id={$_POST["CO_NUM"]}';</script>";
?>
