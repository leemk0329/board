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
  <?php
  session_start();
    if(!isset($_SESSION['USER_ID'])){
    echo "<script>alert('로그인하세요!!'); location.href='index.php';</script>";
    } else { ?>
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
   <div class="container">
    <br>
    <br>
    <br>
       <form action="create_ok.php" method="post">
        <div class="col-lg-6" style="float:none; margin:0 auto;">
        <div class="form-group">
          <label>Title</label>
          <input type="text" placeholder="Title" name="Title" class="form-control">
        </div>
        <div class="form-group">
          <label>Content</label>
          <textarea name="Maintext" placeholder="Content" class="form-control" rows="5"></textarea>
        </div>

          <input type="submit" value="Write" class="btn btn-success pull-right">
        </div>
        </form>
        </div>
   </body><?php ;} ?>
</html>
