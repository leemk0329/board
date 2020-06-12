<?php
session_start();

if(!isset($_SESSION['USER_ID'])){
  echo "<script>alert('로그인하세요!!'); location.href='index.php';</script>";
} else {
require("db.php");
$sql = mysqli_connect($AD,$ID,$PW,$DB);
$dislike_query = "SELECT * FROM dislike WHERE dislike_num = {$_POST["dislike_num"]}";
$dislike_result = mysqli_query($sql,$dislike_query);
$dislike_row = mysqli_num_rows($dislike_result);
  if ($dislike_row == 0) {
    $dislike_query2 = "INSERT INTO dislike(dislike_num, dislike_count)
                    VALUES({$_POST["dislike_num"]},1)";
    $dislike_result2 = mysqli_query($sql,$dislike_query2);
    echo "<script>alert('DISLIKE!!!'); location.href='read.php?id={$_POST["dislike_num"]}';</script>";
} elseif ($dislike_row == 1) {
  $discount_query3 = "UPDATE dislike SET dislike_count = dislike_count + 1 WHERE dislike_num = {$_POST["dislike_num"]}";
  $discount_result3 = mysqli_query($sql,$discount_query3);
  echo "<script>alert('DISLIKE!!!'); location.href='read.php?id={$_POST["dislike_num"]}';</script>";
}
} ?>
