<?php
session_start();

if(!isset($_SESSION['USER_ID'])){
  echo "<script>alert('로그인하세요!!'); location.href='index.php';</script>";
} else {
require("db.php");
$sql = mysqli_connect($AD,$ID,$PW,$DB);
$like_query = "SELECT * FROM good WHERE like_num = {$_POST["like_num"]}";
$like_result = mysqli_query($sql,$like_query);
$like_row = mysqli_num_rows($like_result);
  if ($like_row == 0) {
    $like_query2 = "INSERT INTO good(like_num, like_count)
                    VALUES({$_POST["like_num"]},1)";
    $like_result2 = mysqli_query($sql,$like_query2);
    echo "<script>alert('LIKE!'); location.href='index.php';</script>";
} elseif ($like_row == 1) {
  $count_query3 = "UPDATE good SET like_count = like_count+1 WHERE {$_POST["like_num"]}";
  $count_result3 = mysqli_query($sql,$count_query3);
  echo "<script>alert('LIKE!'); location.href='index.php';</script>";
}
} ?>
