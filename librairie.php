<?php
require "pdo.php";
session_start();

$sql = "SELECT * 
        FROM bd
        LEFT JOIN user_bd on bd.id = user_bd.bd_id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$bd = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($bd);
?>

<?php include "header.php" ?>

<main>
    <h1>Mes albums</h1>

      <?php foreach ($bd as $item) : ?>
          <div class="d-flex">
              <div>
                  <img src="assets/images/<?php echo $item["image"] ?>">
              </div>
              <div class="d-flex flex-column justify-content-between">
                  <div>
                      <h2><?php echo $item["title"] ?></h2>
                      <p><?php echo substr($item["description"], 0, 300) . "..." ?></p>
                  </div>
                  <div class="text-end">
                      <a href="item.php?id=<?php echo $item["id"] ?>">voir</a>
                        <?php if ($item['user_id'] === $_SESSION['user_info']['id']) : ?>
                            <a href="item.php?id=<?php echo $item["id"] ?>">Retirer de ma collection</a>
                        <?php else : ?>
                            <a href="item.php?id=<?php echo $item["id"] ?>">Ajouter à ma collection</a>
                        <?php endif; ?>

                  </div>
              </div>
          </div>
      <?php endforeach; ?>
</main>

<?php include "footer.php" ?>
