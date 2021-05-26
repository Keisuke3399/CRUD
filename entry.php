<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>

<body>
  <h3>User New</h3>
  <hr>
  <form action="entry_save.php" method="post">
    <p>
    <label for="id">ID</label>
    <input type="text" name="user_id" id="">
    </p>
    <P>
      <label for="name">NAME</label>
      <input type="text" name="user_name" id="">
    </P>
    <p>
      <label for="password">PASSWORD</label>
      <input type="password" name="user_pass" id="">
    </p>
    <p>
      <input type="submit" name="save" value="SAVE">
    </p>
  </form>
  <hr>
  <p>
    <a href="list.php">BACK</a>
  </p>

</body>

</html>