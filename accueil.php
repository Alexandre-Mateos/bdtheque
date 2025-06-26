<?php
require "pdo.php";

$sql = "SELECT * 
        FROM user_bd
        JOIN user ON user.id = user_bd.user_id
        JOIN  bd ON bd.id = user_bd.bd_id
        WHERE user.id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(execute);
$bd = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($bd);
?>