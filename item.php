<?php
require "pdo.php";

$sql = "SELECT * 
        FROM bd
        WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_GET["id"]]);
$bd = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($bd);
?>

<!doctype html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Document</title>
</head>
<body>
      <img src="assets/images/<?php echo $bd[0]['image'] ?>">
</body>
</html>
