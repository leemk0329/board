<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
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
     </div>
    </nav>
    <div class="container">
      <br>
      <br>
      <br>
            <form action="login_ok.php" method="post">
            <form role="form">
            <div class="row">
            <div class="col-lg-3" style="float:none; margin:0 auto;">
            <div class="form-group">
            <label><h3>Please sign in</h3></label>
            </div>
            <div class="form-group">
            <input type="text" name="ID" class="form-control" placeholder="ID" required autofocus></div><br>
            <div class="form-group">
            <input type="password" name="PW"class="form-control" placeholder="Enter password" required></div><br>
            <input type="submit" value="Log In" class="btn btn-success pull-right">
          </div>
          </div>
           </form>
           </form>
     </div>
  </body>
</html>
