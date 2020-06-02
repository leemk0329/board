<?php
session_start();
require("db.php");
$sql = mysqli_connect($AD,$ID,$PW,$DB);
$select_query = "INSERT INTO board(Title, Maintext, NAME, Date)
                VALUES('{$_POST["Title"]}','{$_POST["Maintext"]}','{$_SESSION["USER_ID"]}',NOW())";
$result = mysqli_query($sql,$select_query);
if($result === false){
  echo '작성에 실패하였습니다';
  error_log(mysqli_error($sql));
} else {
  echo '작성완료. <a href="index.php">돌아가기</a>';
}
?>
