<?php
require_once("my_functions.php");

# リクエストパラメータを取得
# 入力したユーザIDと名前とパスワードを格納
$user_id = $_POST["user_id"];
$user_name = $_POST["user_name"];
$user_pass = $_POST["user_pass"];
// var_dump($user_id);
// var_dump($user_name);
// var_dump($user_pass);
// die("debug1");

# データベースに接続する
// $dsn = "mysql:dbname=users;host=localhost;charset=utf8mb4";
// $user = "root";
// $pass = "root";
// $pdo = new PDO($dsn, $user, $pass);
// var_dump($pdo);

// DB接続を関数で定義したもの、new_pdo関数を使ってPDOインスタンスを生成
$pdo = new_pdo();

# insert文を実行 (placeholder)
$sql = "insert into user(id, name, password)
  values(:id, :name, :password)";
// var_dump($sql);
// die("test2");

# prepare メソッドは引数にSQLを受け取り、解析済みのSQLを保持した PDOStatement インスタンスを戻り値に返す。
$ps = $pdo->prepare($sql);

# bindValue メソッドを使用、名前付きプレースホルダにデータをバインド
$id = $user_id;
$name = "$user_name";
$password = "$user_pass";

$ps->bindValue(":id", $id, PDO::PARAM_INT);
$ps->bindValue(":name", $name, PDO::PARAM_STR);
$ps->bindValue(":password", $password, PDO::PARAM_STR);

# プリペアドステートメントを操作するためのメソッド
$ps->execute();

# SQLによる更新件数（登録件数）を取得
$count = $ps->rowCount();

# ユーザ一覧にリダイレクトする
header("Location: list.php");
