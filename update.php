<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>게시물작성</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
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
         <li><a href="user.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> <?php }?>
       </ul>
      </div>
     </nav>
    <?php
     require("db.php");
     $sql = mysqli_connect($AD,$ID,$PW,$DB);
     $select_query = "SELECT * FROM board where idx={$_GET['id']}";
     $result = mysqli_query($sql,$select_query);
     $row = mysqli_fetch_array($result);?>
     <div class="container">
      <br>
      <br>
      <br>
     <form action="update_ok.php" method="post">
       <div class="form-group">
         <label>Title</label>
      <input type="hidden" name="ID" value="<?=$_GET['id']?>">
      <input type="text" name="Title" value="<?=$row['Title']?>" class="form-control">
     </div>
     <div class="form-group">
     <label>Content</label>
      <textarea name="Maintext" class="form-control" rows="5"><?=$row['Maintext']?></textarea>
      </div>
      <input type="submit" value="Write" class="btn btn-success pull-right">
      </form>

  </body>
</html>
