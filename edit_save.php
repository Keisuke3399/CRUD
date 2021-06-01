<?php

# リクエストパラメータを取得
# 入力したユーザIDと名前とパスワードを格納

$post_user_id = $_POST["post_user_id"];
$pre_user_id = $_POST["pre_user_id"];
$user_name = $_POST["user_name"];
$user_pass = $_POST["user_pass"];

require_once("my_functions.php");
# データベースに接続する
// $dsn = "mysql:dbname=users;host=localhost;charset=utf8mb4";
// $user = "root";
// $pass = "root";
// $pdo = new PDO($dsn, $user, $pass);
// var_dump($pdo);
$pdo = new_pdo();

# UPDATE文を実行
$sql = "update user set id = :id, name = :name, password = :password where id = :id";

$ps = $pdo->prepare($sql);

$post_id = $post_user_id;
$name = "$user_name";
$password = "$user_pass";
$pre_id = $pre_user_id;

$ps->bindValue(":id", $post_id, PDO::PARAM_INT);
$ps->bindValue(":name", $name, PDO::PARAM_STR);
$ps->bindValue(":password", $password, PDO::PARAM_STR);
$ps->bindValue(":id", $pre_id, PDO::PARAM_INT);

$ps->execute();
$count = $ps->rowCount();

# ユーザ一覧にリダイレクトする
header("Location: list.php");
