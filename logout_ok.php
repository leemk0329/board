<?php
require("db.php");
$sql = mysqli_connect($AD,$ID,$PW,$DB);
  session_start();
	session_destroy();
?>
<meta charset="utf-8">
<script>alert("로그아웃되었습니다."); location.href="/"; </script>
