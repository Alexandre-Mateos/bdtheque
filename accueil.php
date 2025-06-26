<?php
require "pdo.php";
session_start();
var_dump($_SESSION);

$sql = "SELECT *
        FROM user_bd
        JOIN user ON user.id = user_bd.user_id
        JOIN  bd ON bd.id = user_bd.bd_id
        WHERE user.id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(["id" => $_SESSION['user_info']['id']]);
$bd = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($bd);
?>

<?php include "header.php"?>

      <main>
            <?php foreach ($bd as $item) : ?>
                  <div class="d-flex">
                        <div>
                              <img src="assets/images/<?php echo $item["image"] ?>">
                        </div>
                        <div class="d-flex flex-column justify-content-between">
                            <div>
                                <h2><?php echo $item["title"] ?></h2>
                                <p><?php echo substr($item["description"], 0, 300) . "..." ?></p>
                                <p><?php echo $item['note'] ?> / 10</p>
                            </div>
                            <div class="text-end">
                                <a href="item.php?id=<?php echo $item["id"] ?>">voir</a>
                                <a href="#">supprimer</a>
                                <?php if(isset($item['note'])) : ?>
                                    <a href="#">Modifier la note</a>
                                <?php else : ?>
                                    <a href="#">Ajouter une note</a>
                                <?php endif; ?>
                            </div>
                        </div>
                  </div>
            <?php endforeach; ?>
      </main>

<?php include "footer.php" ?>
