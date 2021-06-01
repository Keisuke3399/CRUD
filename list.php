<?php
# データベースに接続する
// $dsn = "mysql:dbname=users;host=localhost;charset=utf8mb4";
// $user = "root";
// $pass = "root";
// $pdo = new PDO($dsn, $user, $pass);

// my_functions.phpファイルを呼び出し
require_once("my_functions.php");
// 上記のDB接続を関数で定義したもの、new_pdo関数を使ってPDOインスタンスを生成
$pdo = new_pdo();
// var_dump($pdo);

# SELECT文を実行
$sql = "select id, name, password from user order by id";

# User List(ユーザ登録表示画面一覧)を表示する
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
  <form action="edit.php" method="get">
    <table border="1">
      <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EDIT</th>
        <th>DELETE</th>
      </tr>
      <?php foreach ($users as $user) { ?>
        <tr>
          <td><?= htmlspecialchars($user["id"]); ?></td>
          <td><?= htmlspecialchars($user["name"]); ?></td>
          <!-- EDITリンククリック
          リクエストパラメーターにIDを付与 -->
          <td><a href="edit.php?user_id=<?php echo $user['id'] ?>">EDIT</a></td>
          <td><a href="delete.php?user_id=<?php echo $user['id'] ?>">DELETE</a></td>
        </tr>
      <?php } ?>
    </table>
  </form>
  <hr>
  <a href="entry.php">NEW</a>

</body>

</html>

