<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2 style="text-align:center"><a href="index.php?">댓글</a></h2><br>
    <table style="text-align:center">
      <thead>
        <tr>
              <th width="50">번호</th>
              <th width="100">글쓴이</th>
              <th width="500">내용</th>
              <th width="100">게시일</th>
        </tr>
        <?php
        require("db.php");
        $sql = mysqli_connect($AD,$ID,$PW,$DB);
         $select_query2 = "SELECT * FROM comment";
         $result2 = mysqli_query($sql,$select_query2);
         $row2 = mysqli_fetch_array($result2);
         while ($row2 = mysqli_fetch_array($result2)) {
         echo '<tr><td>'.$row2['ID'].'</td><td>'
         .$row2['NAME'].'</td><td>'
         .$row2['CO_TEXT'].'</td><td>'
         .$row2['Date'].'</td></tr>';
       }
          ?>
        </thead>
      </table>

  </body>
</html>
