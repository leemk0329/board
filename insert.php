<?php
$sql = mysqli_connect("localhost","root","lmk189600","project");
$select_query = "INSERT INTO board(Title, Maintext, NAME, Date)
                VALUES('테스트8','테스트8','이명경',NOW())";
$result = mysqli_query($sql,$select_query);


 ?>
