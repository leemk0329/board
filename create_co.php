<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="comment_ok.php" method="post">
      <input type="hidden" name="CO_NUM" value="<?=$_GET['id']?>">
      <input type="text" name="NAME" value="작성자"><br>
      <textarea name="CO_TEXT" value="글내용"></textarea><br>
      <input type="submit" value="글쓰기">
  </body>
</html>
