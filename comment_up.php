<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>댓글수정</title>
  </head>
  <body>
     <?php
     require("db.php");
     $sql = mysqli_connect($AD,$ID,$PW,$DB);
     $select_query = "SELECT * FROM comment where ID={$_GET['id']}";
     $result = mysqli_query($sql,$select_query);
     $row = mysqli_fetch_array($result);
     ?>
     <form action="comment_update_ok.php" method="post">
      <input type="hidden" name="ID" value="<?php echo $row['ID'];?>">
      <input type="hidden" name="CO_NUM" value="<?php echo $row['CO_NUM'];?>">
      <input type="text" name="NAME" value="<?php echo $row['NAME'];?>"><br>
      <textarea name="CO_TEXT"><?php echo $row['CO_TEXT'];?></textarea><br>
      <input type="submit" value="수정완료">
    </form>
  </body>
</html>
