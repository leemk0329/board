<?php
require("db.php");
$sql = mysqli_connect($AD,$ID,$PW,$DB);
	if($_POST['id'] != NULL){
	$sql_query = "select * from user where id='{$_POST['id']}'";
  $result = mysqli_query($sql,$sql_query);
  $id_check = mysqli_fetch_array($result);


	if($id_check >= 1){
		echo "This ID is already taken";
	} else {
		echo "ID is available";
	}
} ?>
