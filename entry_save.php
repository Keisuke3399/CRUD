<?php

# POSTに値が入っていれば値を出力
if (isset($_POST["user_id"]) && isset($_POST["user_name"]) && isset($_POST["user_pass"])) 
{
  # リクエストパラメータを取得
  # 入力したユーザIDと名前とパスワードを格納
  $user_id = $_POST["user_id"];
  $user_name = $_POST["user_name"];
  $user_pass = $_POST["user_pass"];
  
  # データベースに接続する
  $dsn = "mysql:dbname=users;host=localhost;charset=utf8mb4";
  $user = "root";
  $pass = "root";
  $pdo = new PDO($dsn, $user, $pass);
  // var_dump($pdo);

  # insert文を実行
  $sql = "insert into user(id, name, password)
  values($user_id, '$user_name', '$user_pass')";
  $count = $pdo->exec($sql);

  # ユーザ一覧にリダイレクトする
  header("Location: list.php");
} 
  