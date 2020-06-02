<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>회원가입</title>
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
    <form action="user_ok.php" method="post">
      <table  style="padding-top:80px" align = center width=100 border=0 cellpadding=2 >
                <tr>
                <td height=20 align= center bgcolor=#ccc><font color=white> 회원가입</font></td>
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
                  <tr>
                  <td>비밀번호 확인</td>
                  <td><input type="text" name="PWCK" size = 30>
                  </td>
                  </tr>
                  <tr>
                  <td>이름</td>
                  <td><input type="text" name="NAME" size = 30>
                  </td>
                  </tr>
                  <center>
                  <input type="submit" value="회원가입하기">
                  </center>

                </td>
                </tr>
      </table>
    </form>
  </body>
</html>
