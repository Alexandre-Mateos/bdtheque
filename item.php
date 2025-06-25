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

<?php include "header.php" ?>
<main>
      <img src="assets/images/<?php echo $bd[0]['image'] ?>">
</main>

<?php include "footer.php" ?>
