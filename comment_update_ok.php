<?php
require("db.php");
$sql = mysqli_connect($AD,$ID,$PW,$DB);
$select_query = "UPDATE comment SET
                 CO_NUM='{$_POST["CO_NUM"]}',
                 NAME='{$_POST["NAME"]}',
                 CO_TEXT='{$_POST["CO_TEXT"]}',
                 Date=NOW()
                 WHERE ID={$_POST["ID"]}";
                $result = mysqli_query($sql,$select_query);
if($result === false){
  echo '수정에 실패하였습니다';
  error_log(mysqli_error($sql));
} else {
  echo "<script>alert('댓글수정완료!!'); location.href='read.php?id={$_POST["CO_NUM"]}';</script>";
}
?>
