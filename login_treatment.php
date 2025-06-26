<?php
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

$redirection = "Location: accueil.php";

header($redirection);

?>