<?php
session_start();
if(!isset($_SESSION['USER_ID'])){
  echo "<script>alert('로그인하세요!!'); location.href='read.php?id={$_POST["like_num"]}';</script>";
} else {
require("db.php");
$sql = mysqli_connect($AD,$ID,$PW,$DB);
$taste_query = "SELECT * FROM taste WHERE taste_id = '{$_SESSION['USER_ID']}' AND taste_num = {$_POST["like_num"]}";
$taste_result = mysqli_query($sql,$taste_query);
$taste_row = mysqli_num_rows($taste_result);
  if ($taste_row == 0) {
    $taste_query2 = "INSERT INTO taste(taste_num, bad_count, taste_id, taste_date)
                    VALUES({$_POST["like_num"]}, 1, '{$_SESSION['USER_ID']}',NOW())";
    $taste_result2 = mysqli_query($sql,$taste_query2);
    echo "<script>alert('BAD!'); location.href='read.php?id={$_POST["like_num"]}';</script>";

} elseif ($taste_row == 1) {
  $taste_query3 = "SELECT * FROM taste WHERE taste_id = '{$_SESSION['USER_ID']}' AND taste_num = {$_POST["like_num"]} AND like_count = 1";
  $taste_result3 = mysqli_query($sql,$taste_query3);
  $row = mysqli_num_rows($taste_result3);
    if ($row == 0) {
      echo "<script>alert('이미 추천하셨습니다!!!'); location.href='read.php?id={$_POST["like_num"]}';</script>";
    }
    elseif ($row == 1) {
    $taste_query4 = "UPDATE taste SET like_count=0, bad_count=1, taste_date=NOW() WHERE taste_id = '{$_SESSION['USER_ID']}' AND taste_num = {$_POST["like_num"]}";
    $taste_result4 = mysqli_query($sql,$taste_query4);
    echo "<script>alert('BAD!'); location.href='read.php?id={$_POST["like_num"]}';</script>";  }
}
} ?>
