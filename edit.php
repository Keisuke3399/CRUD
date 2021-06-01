<?php

// User Edit(編集画面)に初期表示を作成する

# ユーザ一覧画面から付与されたGETクエリパラメータを取得
$user_id = $_GET["user_id"];

require_once("my_functions.php");
# データベースに接続する (PDO インスタンスを生成)
// $dsn = "mysql:dbname=users;host=localhost;charset=utf8mb4";
// $user = "root";
// $pass = "root";
// $pdo = new PDO($dsn, $user, $pass);
// var_dump($pdo);
$pdo = new_pdo();

# SELECT文を実行
// ユーザ一覧画面から取得したユーザID(主キー)で検索、
// 1行取得select文の検索結果の期待値は1件
$sql = "select * from user where id = ?";

$ps = $pdo->prepare($sql);

$id = $user_id;
$ps->bindValue(1, $id, PDO::PARAM_INT);

# User Edit(編集画面)を表示する (PDOStatement インスタンスを生成)
$ps->execute();
//  print_r($st);

# User Edit(編集画面)を表示する
#(メソッドを呼び出し、検索結果にアクセス)1行fetch 出力は連想配列
$user = $ps->fetch();
// echo $user['id'] . ":" . $user["name"].PHP_EOL;
// print_r($user);

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
  <form action="edit_save.php" method="post">
    <p>
      <label for="id">ID</label>
      <input type="text" name="post_user_id" value="<?= $user['id'] ?>">
      <input type="hidden" name="pre_user_id" value="<?= $user['id'] ?>">
    </p>
    <p>
      <label for="name">NAME</label>
      <input type="text" name="user_name" value="<?= $user['name'] ?>">
    </p>
    <p>
      <label for="password">PASSWORD</label>
      <input type="password" name="user_pass">
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