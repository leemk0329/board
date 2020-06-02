<?php
$sql = mysqli_connect("127.0.0.1","root","lmk189600","project");
$select_query = "SELECT * FROM board";
$result = mysqli_query($sql,$select_query);
while ($row = mysqli_fetch_array($result)) {
 $select_query2= "SELECT * FROM comment where CO_NUM ={$row['ID']}";
 $result2 = mysqli_query($sql,$select_query2);
 $co_count = mysqli_num_rows($result2);
 echo $co_count;
}
?>
