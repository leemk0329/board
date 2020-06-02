<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>글수정</title>
  </head>
  <body>
     <?php
     session_start();
     if(!isset($_SESSION['USER_ID'])){?>
     <script>alert("로그인하세요"); location.href="/"; </script>;
     <?php } else {
     require("db.php");
     $sql = mysqli_connect($AD,$ID,$PW,$DB);
     $select_query = "SELECT * FROM board where ID={$_GET['id']}";
     $result = mysqli_query($sql,$select_query);
     $row = mysqli_fetch_array($result);
     ?>
     <form action="update_ok.php" method="post">
      <input type="hidden" name="ID" value="<?=$_GET['id']?>">
      <input type="text" name="Title" value="<?php echo $row['Title'];?>"><br>
      <textarea name="Maintext"><?php echo $row['Maintext'];?></textarea><br>
      <input type="text" name="NAME" value=<?php echo $row['NAME'];?>><br>
      <input type="submit" value="수정완료">
    </form> <?php } ?>

  </body>
</html>
