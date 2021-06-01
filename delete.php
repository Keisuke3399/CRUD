<?php

$user_id = $_GET["user_id"];

require_once("my_functions.php");
// $dsn = "mysql:dbname=users;host=localhost;charset=utf8mb4";
// $user = "root";
// $pass = "root";
// $pdo = new PDO($dsn, $user, $pass);
$pdo = new_pdo();

$sql = "delete from user where id = :id";

$ps = $pdo->prepare($sql);

$id = $user_id;
$ps->bindValue(":id", $id, PDO::PARAM_INT);

$ps->execute();
$count = $ps->rowCount();

header("Location:list.php");
