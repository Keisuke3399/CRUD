<?php

// # データベースに接続
// $dsn = "mysql:dbname=user;host=localhost;charset=utf8mb4;";
// $user = "root";
// $password = "root";
// $pdo = new PDO($dsn, $user, $password);

// $sql = "select id, name from order by id";
  
// $st = $pdo->query($sql);
// $user = $st->fetchAll();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  <h3>User Edit</h3>
  <hr>
  <form action="id" method="get">
    <p>
      <label for="id">ID</label>
      <input type="text" name="user_id" id="">
    </p>
    <p>
      <label for="name">NAME</label>
      <input type="text" name="user_name" id="">
    </p>
    <p>
      <label for="password">PASSWORD</label>
      <input type="text" name="user_pass" id="">
    </p>
    <p>
      <input type="submit" value="SAVE">
    </p>
  </form>
  <hr>
  <p>
    <a href="list.php">BACK</a>
  </p>

</body>
</html>