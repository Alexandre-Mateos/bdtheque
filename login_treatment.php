<?php

if (!isset($_POST['username']) || strlen($_POST['username']) < 1){
      header("Location: index.php?error=1");
      exit();
}

require "pdo.php";
session_start();


$sql = "SELECT * 
        FROM user
        WHERE user_name = :user";
$stmt = $pdo->prepare($sql);
$stmt->execute(["user" => $_POST[ htmlspecialchars('username')]]);
$user_info = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($user_info as $info){
      $_SESSION['user_info'] = $info;
}

header("Location: accueil.php");
exit();
?>