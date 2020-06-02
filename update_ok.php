<?php
require("db.php");
$sql = mysqli_connect($AD,$ID,$PW,$DB);
$select_query = "UPDATE board SET Title='{$_POST["Title"]}',
                 Maintext='{$_POST["Maintext"]}',
                 NAME='{$_POST["NAME"]}',
                 Date=NOW()
                 WHERE ID={$_POST["ID"]}";
                $result = mysqli_query($sql,$select_query);
if($result === false){
  echo '수정에 실패하였습니다';
  error_log(mysqli_error($sql));
} else {
  echo '글수정완료. <a href="index.php">돌아가기</a>';
}
?>
