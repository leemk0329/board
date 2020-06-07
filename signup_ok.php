<?php
require("db.php");
$sql = mysqli_connect($AD,$ID,$PW,$DB);
if ($_POST["pw"]!=$_POST["pwck"]){
  echo "<script>alert('가입완료!!'); location.href='signup.php';</script>";
} else {
$PW=$_POST["pw"];
$USER_PW = password_hash($PW, PASSWORD_DEFAULT);
$ID_query = "select * from user where id='{$_POST["id"]}'";
$IDresult = mysqli_query($sql,$ID_query);
$ID = mysqli_fetch_array($IDresult);
if($ID >= 1){
		echo "<script>alert('중복된아이디입니다.'); history.back();</script>";
	}else{
$select_query = "INSERT INTO user(ID, PW, NAME, Date)
                VALUES('{$_POST["id"]}','$USER_PW','{$_POST["NAME"]}',NOW())";
$result = mysqli_query($sql,$select_query);
if($result === false){
  echo "<script>alert('가입실패!!'); location.href='signup.php';</script>";
  echo mysqli_error($sql);
} else {
  echo "<script>alert('가입완료!!'); location.href='index.php';</script>";
}
}
}
?>
