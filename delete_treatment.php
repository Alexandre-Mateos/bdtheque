<?php
require "pdo.php";
session_start();

if (
      !isset($_GET['id']) || empty($_GET['id']) ||
      !isset($_SESSION['user_info']['id']) || empty($_SESSION['user_info']['id']) ||
      !is_numeric($_GET['id'])
) {
      header("Location: librairie.php?error=2");
      exit();
}

$sql = "DELETE FROM user_bd
        WHERE user_id = :user_id AND bd_id = :bd_id;";
$stmt = $pdo->prepare($sql);
$stmt->execute([
      'user_id' => (int) $_SESSION['user_info']['id'],
      'bd_id' => (int) $_GET['id']
]);

if(isset($_GET['from']) && $_GET['from'] === 'librairie'){
      header("Location: librairie.php?delete=1");
      exit();
}
if(isset($_GET['from']) && $_GET['from'] === 'accueil'){
      header("Location: accueil.php?delete=1");
      exit();
}


?>