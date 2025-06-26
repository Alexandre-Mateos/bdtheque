<?php
require "pdo.php";
session_start();

//if (
//      (!isset($_GET['id']) || strlen($_GET['id']) < 1)
//      || (!isset($_SESSION['id']) || strlen($_SESSION['id']) < 1)
//){
//      header("Location: librairie.php?error=1");
//      exit();
//}

$sql = "INSERT INTO user_bd (user_id, bd_id, created_at)
        VALUES (:user_id, :bd_id, :created_at)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
      'user_id' => htmlspecialchars($_SESSION['user_info']['id']),
      'bd_id' => htmlspecialchars($_GET['id']),
      'created_at' => date('Y-m-d')
]);

header("Location: librairie.php?success=1");
exit();
?>