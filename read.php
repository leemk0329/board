<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>글읽기</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    .btn-space {
    margin-right: 10px;
}
    </style>
  </head>
  <body>
    <?php session_start(); ?>
    <nav class="navbar navbar-inverse">
     <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php?">Free Board</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <?php
    	   if(isset($_SESSION['USER_ID'])){?>
    		  <li><a href="logout_ok.php"><span style="font-weight:bold; color:white"><?php echo $_SESSION['USER_ID'];?></span>  <span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
       <?php } else { ?>
         <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
         <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> <?php }?>
      </ul>
     </div>
    </nav>

    <div class="container">
      <br>
          <?php
          require("db.php");
          $sql = mysqli_connect($AD,$ID,$PW,$DB);
          $select_query = "SELECT * FROM board WHERE ID={$_GET['id']}";
          $result = mysqli_query($sql,$select_query);
          $row = mysqli_fetch_array($result);
          $row['HIT'] = $row['HIT'] +1;
          $HIT_query = "UPDATE board SET HIT= {$row['HIT']} WHERE ID={$_GET['id']}";;
          $result_HIT =  mysqli_query($sql,$HIT_query);
          ?>
          <div class="page-header">
          <h3 align="center"><?php echo $row['Title']?></h3>
          </div>
          <p align=right><?php echo $row['NAME']?> <?php echo $row['Date']?></p>
          <div class="jumbotron" style="background-color: transparent !important;">
          <p align=center><?php echo $row['Maintext']?></p>
          </div>

        <br>
      <?php // 작성자로 로그인시 수정 및 삭제창 나타나도록 구현
      if (isset($_SESSION['USER_ID'])){
        if($row['NAME'] === $_SESSION['USER_ID']){?>
        <span><form action="delete_ok.php" method="post">
        <input type="hidden" name="ID" value="<?=$_GET['id']?>">
        <input class="btn btn-primary pull-right btn-lg" type="submit" value="Delete">
        </form></span>
          <span><a href="update.php?id=<?=$_GET['id'];?>">
          <button type="button" class="btn btn-primary pull-right btn-space btn-lg">Edit</button></a></span>
        <?php }
        }?>
      <span><a href="index.php?"><button type="button" class="btn btn-primary pull-left btn-lg">List</button></a></span>
      </div>
      <br>




     <div class="container">
          <?php //댓글창 불러오기 및 댓글작성자만 수정 및 삭제 활성화, 회원만 작성
           require("db.php");
           $sql = mysqli_connect($AD,$ID,$PW,$DB);
           $select_query2 = "SELECT * FROM comment WHERE CO_NUM={$_GET['id']}";
           $result2 = mysqli_query($sql,$select_query2);
           while ($row2 = mysqli_fetch_array($result2)){ ?>
           <div class="panel panel-success">
           <div class="panel-heading"><?=$row2['NAME']?> <?=$row2['Date']?></div>
           <div class="panel-body"><span><?=$row2['CO_TEXT']?></span><?php
           if (isset($_SESSION['USER_ID'])
           and $row2['NAME'] === $_SESSION['USER_ID']){?>
           <span><form action="commen_delete_ok.php" method="post">
           <input type="hidden" name="ID" value="<?=$row2['ID']?>">
           <input type="hidden" name="CO_NUM" value="<?=$row2['CO_NUM']?>">
           <input type="submit" value="Delete" class="btn btn-primary pull-right btn-lg"></span>
           <span><a href="comment_up.php?id=<?=$row2['ID']?>"><button type="button" class="btn btn-primary btn-space pull-right btn-lg"> Edit </button></a></span>
           </form></div><?php } ?>
           <?php } ?>
           </div>
            </div>

           <br>
           <br>
    <div class="container">
           <form action="comment_ok.php" method="post">
             <div class="form-group">
             <input type="hidden" name="CO_NUM" value="<?=$_GET['id']?>">
             <textarea name="CO_TEXT"
             placeholder="Comment" class="form-control" rows="2"></textarea>
             </div>
             <input type="submit" value="Write" class="btn btn-success pull-right btn-lg">
        </form>
    </div>


  </body>
</html>
