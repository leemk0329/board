<?php
require("db.php");
$sql = mysqli_connect($AD,$ID,$PW,$DB);
$select_query = "DELETE FROM board WHERE ID={$_POST["ID"]}";
$result = mysqli_query($sql,$select_query);
// 본문삭제시 댓글삭제 CO_NUM과 본문 ID값이 같음
$select_query2 = "DELETE FROM comment WHERE CO_NUM={$_POST["ID"]}";
$result2 = mysqli_query($sql,$select_query2);
header('Location:/index.php?');
?>
