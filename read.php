<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>글읽기</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    .btn-space {
    margin-right: 10px;
}
    </style>
  </head>
  <body>
    <?php session_start();
    date_default_timezone_set('Asia/Seoul');
     ?>
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

      <br>
          <?php
          require("db.php");
          $sql = mysqli_connect($AD,$ID,$PW,$DB);
          $select_query = "SELECT * FROM board WHERE idx={$_GET['id']}";
          $result = mysqli_query($sql,$select_query);
          $row = mysqli_fetch_array($result);
          $row['HIT'] = $row['HIT'] +1;
          $HIT_query = "UPDATE board SET HIT= {$row['HIT']} WHERE idx={$_GET['id']}";
          $result_HIT =  mysqli_query($sql,$HIT_query);

          $like_query = "SELECT SUM(like_count) AS all_like FROM taste WHERE taste_num = {$_GET['id']}";
          $like_result = mysqli_query($sql,$like_query);
          $like_row = mysqli_fetch_array($like_result);

          $like_query2 = "SELECT SUM(bad_count) AS all_bad FROM taste WHERE taste_num = {$_GET['id']}";
          $like_result2 = mysqli_query($sql,$like_query2);
          $like_row2 = mysqli_fetch_array($like_result2);
          ?>
          <div class="container">
          <table class="table table-striped">
            <thead>
            <tr>
              <th></th>
              <th></th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
             <td class="col-sm-3 text-left" style="word-spacing:10px"><h3><i class="fa fa-thumbs-up"><?php echo $like_row['all_like']?></i>
             <i class="fa fa-thumbs-down"><?php echo $like_row2['all_bad']?></i></h3></td>

            <td class="col-sm-6 text-center"><h2><?php echo $row['Title']?></h2></td>

            <td class="col-sm-3 text-right" style="word-spacing:10px"><h4><?php echo $row['NAME']?> <?php echo $row['Date']?></h4></td>
            </tr>
           </tbody>
          </table>
          </div>

          <div class="container">

          <div class="jumbotron" style="background-color: transparent !important;">
          <p align=center><?php echo $row['Maintext']?></p>
          </div>
          </div>

        <br>
        <div class="container">
        <div class="row">
        <div class="col-sm-3">
      <?php // 작성자로 로그인시 수정 및 삭제창 나타나도록 구현
      if (isset($_SESSION['USER_ID'])){
        if($row['NAME'] === $_SESSION['USER_ID']){?>
        <span><form action="delete_ok.php" method="post">
        <input type="hidden" name="ID" value="<?=$_GET['id']?>">
        <input class="btn btn-primary pull-left btn-lg btn-space" type="submit" value="Delete">
        </form></span>
          <span><a href="update.php?id=<?=$_GET['id'];?>">
          <button type="button" class="btn btn-primary pull-left btn-space btn-lg">Edit</button></a></span>
        <?php }
        }?></div>


        <div class="col-sm-3 text-right">
        <span><form action="like_ok.php" method="post">
        <input type="hidden" name="like_num" value="<?=$_GET['id']?>">
        <i class="fa fa-thumbs-up">
        <input class="btn btn-success btn-sm btn-space" type="submit" value="LIKE ">
        </i></form></span>
        </div>
        <div class="col-sm-3">
        <span><form action="dislike_ok.php" method="post">
        <input type="hidden" name="like_num" value="<?=$_GET['id']?>">
        <i class="fa fa-thumbs-down">
        <input class="btn btn-warning btn-sm btn-space" type="submit" value="DISLIKE">
        </i></form></span></div>

        <div class="col-sm-3 text-right">
        <span><a href="index.php?"><button type="button" class="btn btn-info btn-lg">List</button></a></span>
        </div>
        </div>
        </div>
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
      <br>
      <br>

     <div class="container">
          <?php //댓글창 불러오기 및 댓글작성자만 수정 및 삭제 활성화, 회원만 작성
           require("db.php");
           $sql = mysqli_connect($AD,$ID,$PW,$DB);
           $select_query2 = "SELECT * FROM comment WHERE CO_NUM={$_GET['id']}";
           $result2 = mysqli_query($sql,$select_query2);
           while ($row2 = mysqli_fetch_array($result2)){ ?>
           <ul class="media-list">
           <li class="media">
           <div class="media-body">
           <div class="well">
           <h4 class="media-heading text-uppercase reviews"><?=$row2['NAME']?></h4>
           <ul class="media-date text-uppercase reviews list-inline">
           <li><?=$row2['Date']?></li>
           </ul>
           <p class="media-comment">
           <?=$row2['CO_TEXT']?>
           </p><?php
           if (isset($_SESSION['USER_ID'])
           and $row2['NAME'] === $_SESSION['USER_ID']){?>
           <div class="row">
           <span><form action="commen_delete_ok.php" method="post">
           <input type="hidden" name="ID" value="<?=$row2['ID']?>">
           <input type="hidden" name="CO_NUM" value="<?=$row2['CO_NUM']?>">
           <input type="submit" value="Delete" class="btn btn-info pull-right"></form></span>     <span><a href="comment_up.php?id=<?=$row2['ID']?>"><button type="button" class="btn btn-primary btn-circle pull-right btn-space"> Edit </button></a></span> </div>
           <?php } ?>
           </div>
           </div>
           </li>
           </ul>
           <?php } ?>
           </div>


           <br>
           <br>

  </body>
</html>
