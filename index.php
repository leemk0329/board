<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>게시판만들기</title>
   </head>
  <body>
    <h1 style="text-align:center"><a href="index.php?">게시판만들기</a></h1><br>
    <br>
      <table style="text-align:center">
        <style>
        table, th, td { border: 1px solid black; }
        table { border-collapse: collapse; }
        </style>
        <thead>
          <tr>
              <th width="50">번호</th>
                <th width="500">제목</th>
                <th width="100">글쓴이</th>
                <th width="100">게시일</th>
          </tr>
          <?php
          require("db.php");
          $sql = mysqli_connect($AD,$ID,$PW,$DB);
          $select_query = "SELECT * FROM board order by ID desc";
          $result = mysqli_query($sql,$select_query);
          while ($row = mysqli_fetch_array($result)) {
            $select_query2= "SELECT * FROM comment where CO_NUM ={$row['ID']}";
            $result2 = mysqli_query($sql,$select_query2);
            $co_count = mysqli_num_rows($result2);
          ?>
          <tbody>
            <tr>
              <td width="50"><?php echo $row['ID'];?></td>
              <td width="500">
              <a href="read.php?id=<?php echo $row["ID"];?>">
              <?php echo $row["Title"];?> <span style="font-weight:bold; color:blue">(<?php echo $co_count;?>)</span></a></td>
              <td width="100"><?php echo $row["NAME"]; ?></td>
              <td width="100"><?php echo $row["Date"]; ?></td>
            </tr>
          </tbody>
          <?php } ?>
        </thead>
      </table>
      <br>
      <br><hr>
      <a href="create.php"><button>글쓰기</button></a>
  </body>
</html>
