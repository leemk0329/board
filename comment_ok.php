<?php
session_start();
if(!isset($_SESSION['USER_ID'])){?>
<script>alert("로그인하세요"); location.href="/"; </script>; <?php
} else { ?>
<?php
require("db.php");
$sql = mysqli_connect($AD,$ID,$PW,$DB);
$select_query = "INSERT INTO comment(CO_NUM,NAME,CO_TEXT,Date)
                VALUES('{$_POST["CO_NUM"]}','{$_SESSION["USER_ID"]}','{$_POST["CO_TEXT"]}',NOW())";
$result = mysqli_query($sql,$select_query);
if($result === false){
  echo '작성에 실패하였습니다';
  error_log(mysqli_error($sql));
} else {
  echo '작성완료. <a href="index.php">돌아가기</a>';
}?>
<?php } ?>
