<?php
session_start();
echo $_POST["Title"];
echo $_POST["Maintext"];
echo $_SESSION["USER_ID"];
require("db.php");
$sql = mysqli_connect($AD,$ID,$PW,$DB);
$re_num ="ALTER TABLE board AUTO_INCREMENT=1";
$renum = mysqli_query($sql,$re_num);
$select_query = "INSERT INTO board(Title, Maintext, NAME, Date, HIT)
                VALUES('{$_POST["Title"]}','{$_POST["Maintext"]}','{$_SESSION["USER_ID"]}',NOW(),1)";
$result = mysqli_query($sql,$select_query);
if($result === false){
  echo '작성에 실패하였습니다';
  error_log(mysqli_error($sql));
} else {
  echo "<script>alert('작성완료!!'); location.href='index.php';</script>";
}
?>
