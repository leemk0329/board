<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>글읽기</title>
  </head>
  <body>
    <?php session_start(); ?>
    <h1 style="text-align:center"><a href="index.php?">게시판만들기</a></h1><br>
    <br>
      <table style="text-align:center">
        <thead>
          <tr>
            <th width="50">번호</th>
            <th width="100">제목</th>
            <th width="500">내용</th>
            <th width="100">글쓴이</th>
            <th width="100">게시일</th>
          </tr>
          <?php
          require("db.php");
          $sql = mysqli_connect($AD,$ID,$PW,$DB);
          $select_query = "SELECT * FROM board WHERE ID={$_GET['id']}";
          $result = mysqli_query($sql,$select_query);
          $row = mysqli_fetch_array($result);
          echo '<tr><td>'.$row['ID'].'</td><td>'
          .$row['Title'].'</td><td>'
          .$row['Maintext'].'</td><td>'
          .$row['NAME'].'</td><td>'
          .$row['Date'].'</td></tr>';
           ?>
        </thead>
      </table>
      <br>
      <br>
      <?php // 작성자로 로그인시 수정 및 삭제창 나타나도록 구현
      if (isset($_SESSION['USER_ID'])){?>
      <?php if($row['NAME'] === $_SESSION['USER_ID']){?>
      <a href="update.php?id=<?=$_GET['id'];?>">글수정</a>
      <form action="delete_ok.php" method="post">
        <input type="hidden" name="ID" value="<?=$_GET['id']?>">
        <input type="submit" value="delete">
      </form><?php }?>
      <?php }?>
      <br>
      <br>
      <a href="index.php?">글목록</a>


    <h2 style="text-align:center"><a href="index.php?">댓글</a></h2><br>
      <table style="text-align:center">
        <thead>
          <tr>
                <th width="50">번호</th>
                <th width="150">글쓴이</th>
                <th width="500">내용</th>
                <th width="150">게시일</th>
          </tr>
          <?php //댓글창 불러오기 및 댓글작성자만 수정 및 삭제 활성화, 회원만 작성
           require("db.php");
           $sql = mysqli_connect($AD,$ID,$PW,$DB);
           $select_query2 = "SELECT * FROM comment WHERE CO_NUM={$_GET['id']}";
           $result2 = mysqli_query($sql,$select_query2);
           while ($row2 = mysqli_fetch_array($result2)){ ?>
           <tr><td><?=$row2['ID'];?></td>
           <td><?=$row2['NAME']?></td>
           <td><?=$row2['CO_TEXT']?></td>
           <td><?=$row2['Date']?></td>
             <?php
             if (isset($_SESSION['USER_ID'])
             and $row2['NAME'] === $_SESSION['USER_ID']){?>
             <td><a href="comment_up.php?id=<?=$row2['ID']?>">수정</a>
             <form action="commen_delete_ok.php" method="post">
             <input type="hidden" name="ID" value="<?=$row2['ID']?>">
             <input type="submit" value="delete">
             </form></td></tr>
            <?php } ?>
            <?php } ?>
        </thead>
      </table>
           <br>
           <br>
           <form action="comment_ok.php" method="post">
             <input type="hidden" name="CO_NUM" value="<?=$_GET['id']?>">
             <textarea name="CO_TEXT" value="글내용"></textarea><br>
             <input type="submit" value="댓글쓰기">
           </form>
  </body>
</html>
