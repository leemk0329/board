<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
 session_start();
?>
  <head>
    <meta charset="utf-8">
    <title>자유게시판</title>
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
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> <?php }?>
     </ul>
    </div>
   </nav>
    <br>
    <div class="container">

      <table class="table table-hover">
        <thead>
          <tr>
                <th width="100">Number</th>
                <th width="300">Title</th>
                <th width="50">ID</th>
                <th width="50">Date</th>
                <th width="50">Views</th>
          </tr>
        </thead>
          <?php
          if(isset($_GET['page'])){
           $page = $_GET['page'];
             }else{
               $page = 1;
             }
          require("db.php");
          $sql = mysqli_connect($AD,$ID,$PW,$DB);
          $select_query = "SELECT * FROM board";
          $result = mysqli_query($sql,$select_query);
          $row_count = mysqli_num_rows($result);
          $list = 10;
          $block_ct = 5;

          $block_num = ceil($page/$block_ct);
          $block_start = (($block_num - 1) * $block_ct) + 1;
          $block_end = $block_start + $block_ct - 1;
          $total_page = ceil($row_count / $list);
          if($block_end > $total_page) $block_end = $total_page;
          $total_block = ceil($total_page/$block_ct);
          $start_num = ($page-1) * $list;

          $select_query2 = "SELECT * FROM board order by idx desc limit $start_num, $list";
          $result2 = mysqli_query($sql,$select_query2);
          while ($row = mysqli_fetch_array($result2)) {
            $select_query3= "SELECT * FROM comment where CO_NUM ={$row['idx']}";
            $result3 = mysqli_query($sql,$select_query3);
            $co_count = mysqli_num_rows($result3);
          ?>
          <tbody>
            <tr>
              <td><?php echo $row['idx'];?></td>
              <td>
              <a href="read.php?id=<?php echo $row["idx"];?>">
              <?php echo $row["Title"];?> <span style="font-weight:bold; color:blue">(<?php echo $co_count;?>)</span></a></td>
              <td><?php echo $row["NAME"]; ?></td>
              <td><?php echo $row["Date"]; ?></td>
              <td><?php echo $row["HIT"]; ?></td>
            </tr>
          </tbody>

          <?php } ?>
      </table>
      <span><a href="create.php"><button type="button" class="btn btn-lg btn-success pull-right">Write</button></a></span>
      </div>

      <ul>
      <div class="container">
        <div style="text-align: center;">
        <ul class="pagination justify-content-center">
      <?php
        if($page <= 1)
        { //만약 page가 1보다 크거나 같다면
          echo "<li class=\"page-item\"><a class=\"page-link\" href='?page=1'>First</a></li>"; //처음이라는 글자에 빨간색 표시
        }else{
          echo "<li class=\"page-item\"><a class=\"page-link\" href='?page=1'>First</a></li>"; //알니라면 처음글자에 1번페이지로 갈 수있게 링크
        }
        if($page <= 1)
        { //만약 page가 1보다 크거나 같다면 빈값

        }else{
        $pre = $page-1; //pre변수에 page-1을 해준다 만약 현재 페이지가 3인데 이전버튼을 누르면 2번페이지로 갈 수 있게 함
          echo "<li class=\"page-item\"><a class=\"page-link\" href='?page=$pre'>Previous</a></li>"; //이전글자에 pre변수를 링크한다. 이러면 이전버튼을 누를때마다 현재 페이지에서 -1하게 된다.
        }
        for($i=$block_start; $i<=$block_end; $i++){
          //for문 반복문을 사용하여, 초기값을 블록의 시작번호를 조건으로 블록시작번호가 마지박블록보다 작거나 같을 때까지 $i를 반복시킨다
          if($page == $i){ //만약 page가 $i와 같다면
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"#\">$i</a></li>"; //현재 페이지에 해당하는 번호에 굵은 빨간색을 적용한다
          }else{
            echo "<li class=\"page-item\"><a class=\"page-link\" href='?page=$i'>$i</a></li>"; //아니라면 $i
          }
        }
        if($block_num >= $total_block){ //만약 현재 블록이 블록 총개수보다 크거나 같다면 빈 값
        }else{
          $next = $page + 1; //next변수에 page + 1을 해준다.
          echo "<li class=\"page-item\"><a class=\"page-link\" href='?page=$next'>Next</a></li>"; //다음글자에 next변수를 링크한다. 현재 4페이지에 있다면 +1하여 5페이지로 이동하게 된다.
        }
        if($page >= $total_page){ //만약 page가 페이지수보다 크거나 같다면
          echo "<li class=\"page-item\"><a class=\"page-link\" href=\"#\">Last</a></li>"; //마지막 글자에 긁은 빨간색을 적용한다.
        }else{
          echo "<li class=\"page-item\"><a class=\"page-link\" href='?page=$total_page'>Last</a></li>"; //아니라면 마지막글자에 total_page를 링크한다.
        }
      ?>
      </ul>
      </div>
      </div>

      <script>$(document).ready(function(e){
          $('.search-panel .dropdown-menu').find('a').click(function(e) {
      		e.preventDefault();
      		var param = $(this).attr("href").replace("#","");
      		var concept = $(this).text();
      		$('.search-panel span#search_concept').text(concept);
      		$('.input-group #search_param').val(param);
      	});
      });</script>


        <div class="container center-block" style="width: 600px;padding:10px;">
        <div class="row">
        <form action="search.php" method="get">
        <div class="col-xs-8 col-xs-offset-2">
        <div class="input-group">
          <div class="input-group-btn search-panel">
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                      	<span id="search_concept">Filter by</span> <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#Title">Title</a></li>
                        <li><a href="#Name">Name</a></li>
                        <li><a href="#Maintext">Content</a></li>

                      </ul>
                  </div>
        <input type="hidden" name="catgo" id="search_param">
        <input type="text" class="form-control" name="search" placeholder="Search term...">
        <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
        </span>
        </div>
        </div>
        </form>
        </div>
        </div>


</html>
