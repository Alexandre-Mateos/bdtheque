<?php
require "pdo.php";

$sql = "SELECT * 
        FROM bd
        JOIN serie ON serie.id = bd.serie_id
        JOIN bd_personne_role ON bd.id = bd_personne_role.bd_id
        JOIN personne ON personne.id = bd_personne_role.personne_id
        JOIN role ON role.id = bd_personne_role.role_id
        WHERE bd.id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $_GET["id"]]);
$bd = $stmt->fetchAll(PDO::FETCH_ASSOC);




var_dump($bd);
?>

<?php include "header.php" ?>
<main>
    <img src="assets/images/<?php echo $bd[0]['image'] ?>">
    <h1><?php echo $bd[0]['title'] ?></h1>
    <p><?php echo $bd[0]['description'] ?></p>
    <ul>
    <?php foreach ($bd as $item) : ?>
        <li><?php echo $item['label'] ?> : <?php echo $item['name'] ?></li>
    <?php endforeach; ?>
    </ul>
</main>

<?php include "footer.php" ?>
