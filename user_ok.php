<?php
require("db.php");
$sql = mysqli_connect($AD,$ID,$PW,$DB);
if ($_POST["PW"]!=$_POST["PWCK"]){
  echo '비밀번호를 확인해주세요 <a href="user.php">돌아가기</a>';
} else {
$PW=$_POST["PW"];
$USER_PW = password_hash($PW, PASSWORD_DEFAULT);
$select_query = "INSERT INTO user(ID, PW, NAME, Date)
                VALUES('{$_POST["ID"]}','$USER_PW','{$_POST["NAME"]}',NOW())";
$result = mysqli_query($sql,$select_query);
if($result === false){
  echo '가입에 실패햇습니다. <a href="user.php">돌아가기</a>';
  echo mysqli_error($sql);
} else {
  echo '가입완료. <a href="index.php">돌아가기</a>';
}
}
?>
