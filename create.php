<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>게시물작성</title>
  </head>
  <style>
        table.table2{
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 1.5;
                border-top: 1px solid #ccc;
                margin : 20px 10px;
        }
        table.table2 tr {
                width: 50px;
                padding: 10px;
                font-weight: bold;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
        }
        table.table2 td {
                 width: 70px;
                 padding: 10px;
                 vertical-align: top;
                 border-bottom: 1px solid #ccc;
        }
</style>
  <body>
    <form action="create_ok.php" method="post">
      <table  style="padding-top:50px" align = center width=800 border=0 cellpadding=2 >
                <tr>
                <td height=20 align= center bgcolor=#ccc><font color=white> 글쓰기</font></td>
                </tr>
                <tr>
                <td bgcolor=white>
                <table class = "table2">
                  <tr>
                  <td>제목</td>
                  <td><input type="text" name="Title" size = 60>
                  </td>
                  </tr>
                  <tr>
                  <td>본문</td>
                  <td><textarea name="Maintext" content cols=85 rows=15></textarea></td>
                  </tr>
                  <tr>
                  <td>작성자</td>
                  <td><input type="text" name="NAME" size=20>
                  </td>
                  </tr>

                  <center>
                  <input type="submit" value="글쓰기">
                  </center>
                </td>
                </tr>
      </table>
    </form>
  </body>
</html>
