<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>
    $(document).ready(function(e) {
    	$(".check").on("keyup", function(){ //check라는 클래스에 입력을 감지
    		var self = $(this);
    		var id;

    		if(self.attr("id") === "id"){
    			id = self.val();
    		}

    		$.post( //post방식으로 id_check.php에 입력한 userid값을 넘깁니다
    			"id_check.php",
    			{ id : id },
    			function(data){
    				if(data){ //만약 data값이 전송되면
    					self.parent().parent().find("ID").html(data); //div태그를 찾아 html방식으로 data를 뿌려줍니다.
    					self.parent().parent().find("ID").css("color", "#F00"); //div 태그를 찾아 css효과로 빨간색을 설정합니다
    				}
    			}
    		);
    	});
    });
    </script>
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
       <?php }?>
      </ul>
     </div>
    </nav>
    <div class="container">
      <br>
      <br>
      <br>

    <form action="signup_ok.php" method="post">
      <form role="form">
      <div class="row">
      <div class="col-lg-3" style="float:none; margin:0 auto;">
      <div class="form-group">
      <label><h3>Please sign Up</h3></label>
      </div>
      <div class="form-group">
      <input type="text" name="id" id="id" class="form-control check" placeholder="Enter ID" required autofocus></div>
      <ID id="id_check"></ID>
      <br>

      <div class="form-group">
      <input type="password" name="pw" class="form-control" placeholder="Enter Password" required></div>

      <br>
      <div class="form-group">
      <input type="password" name="pwck" id="pw" class="form-control" placeholder="Enter Password Again" required></div>

      <br>
      <div class="form-group">
      <input type="text" name="NAME" class="form-control" placeholder="Enter NAME" required></div><br>
      <input type="submit" value="Sign Up" class="btn btn-success pull-right">
      </div>
      </div>
      </form>
      </form>
    </div>
  </body>
</html>
