<?php

# 登録画面で格納した値をを呼び出す
$user_id = $_POST["user_id"];
$user_name = $_POST["user_name"];
$user_pass = $_POST["user_pass"];

$dsn = "mysql:dbname=users;host=localhost;charset=utf8mb4";
$user = "root";
$pass = "root";
$pdo = new PDO($dsn, $user, $pass);

// var_dump($pdo);

$sql = "select id, name, password from user order by id";

$st = $pdo->query($sql);
$users = $st->fetchAll();

// print_r($users);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>

<body>
  <h3>User List</h3>
  <hr>
  <br>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>NAME</th>
      <th>EDIT</th>
    </tr>
    <?php foreach ($users as $user) { ?>
      <tr>
        <td><?= htmlspecialchars($user["id"]); ?></td>
        <td><?= htmlspecialchars($user["name"]); ?></td>
        <td><a href="edit.php">EDIT</a></td>
      </tr>
    <?php } ?>
  </table>
  <br>
  <hr>
  <a href="entry.php">NEW</a>

</body>

</html>
