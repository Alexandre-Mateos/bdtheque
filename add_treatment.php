<?php
require "pdo.php";
session_start();

//var_dump($_GET['id']);
//var_dump($_SESSION['user_info']['id']);

if (
      !isset($_GET['id']) || empty($_GET['id']) ||
      !isset($_SESSION['user_info']['id']) || empty($_SESSION['user_info']['id']) ||
      !is_numeric($_GET['id'])
) {
header("Location: librairie.php?error=1");
exit();
}


$sql = "INSERT INTO user_bd (user_id, bd_id, created_at)
        VALUES (:user_id, :bd_id, :created_at)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
      'user_id' => (int) $_SESSION['user_info']['id'],
      'bd_id' => (int) $_GET['id'],
      'created_at' => date('Y-m-d')
]);

header("Location: librairie.php?success=1");
exit();
?>