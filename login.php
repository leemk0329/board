<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>로그인</title>
  </head>
  <style>
        table.table2{
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 1.5;
                border-top: 1px solid #ccc;
                margin : 10px 10px;
        }
        table.table2 tr {
                width: 30px;
                padding: 5px;
                font-weight: bold;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
        }
        table.table2 td {
                 width: 50px;
                 padding: 4px;
                 vertical-align: top;
                 border-bottom: 1px solid #ccc;
        }
</style>
  <body>
    <form action="login_ok.php" method="post">
      <table  style="padding-top:80px" align = center width=100 border=0 cellpadding=2 >
                <tr>
                <td height=20 align= center bgcolor=#ccc><font color=white> 로그인</font></td>
                </tr>
                <tr>
                <td bgcolor=white>
                <table class = "table2">
                  <tr>
                  <td>아이디</td>
                  <td><input type="text" name="ID" size = 30>
                  </td>
                  </tr>
                  <tr>
                  <td>비밀번호</td>
                  <td><input type="text" name="PW" size = 30>
                  </td>
                  </tr>
                </td>
                </tr>
      </table>
    <center>
    <input type="submit" value="로그인">
    </center>
    </form>
    <br>
  </body>
  <center>
  <a href="user.php">회원가입</a>
  </center>
</html>
