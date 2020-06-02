<?php
session_start();
require("db.php");
$sql = mysqli_connect($AD,$ID,$PW,$DB);
$select_query = "SELECT * FROM user WHERE ID='".$_POST["ID"]."'";
$result = mysqli_query($sql,$select_query);
$row = mysqli_fetch_array($result);
  if(password_verify($_POST["PW"],$row["PW"])){
    $_SESSION['USER_ID'] = $_POST["ID"];
    $_SESSION['USER_PW'] = $_POST["PW"];
    echo "<script>alert('로그인되었습니다.'); location.href='index.php';</script>";
  }  else  {
     echo "<script>alert('아이디 또는 비밀번호를 확인해주세요.'); history.back();</script>";
   }
?>
