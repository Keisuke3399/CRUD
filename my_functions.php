<?php

function new_pdo()
{
  $pdo = new PDO("mysql:host=localhost;dbname=users", "root", "root");
  return $pdo;
}
var_dump($pdo);