<?php
require "pdo.php";
session_start();

$sql = "SELECT bd.*, user_id
        FROM bd
        LEFT JOIN user_bd on bd.id = user_bd.bd_id AND user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(["user_id" => $_SESSION['user_info']['id']]);
$bd = $stmt->fetchAll(PDO::FETCH_ASSOC);

//var_dump($bd);
?>

<?php include "header.php" ?>

<main>
    <h1>Explorer</h1>

      <?php if(isset($_GET['error']) && $_GET['error'] === '1') : ?>
          <p>Un problème est survenue. Impossible d'ajouter l'album à la collection</p>
      <?php endif; ?>

      <?php if(isset($_GET['success']) && $_GET['success'] === '1') : ?>
          <p>L'album a été ajouté à la collection !</p>
      <?php endif; ?>

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
                            <a href="#">Retirer de ma collection</a>
                        <?php else : ?>
                            <a href="add_treatment.php?id=<?php echo $item['id'] ?>">Ajouter à ma collection</a>
                        <?php endif; ?>

                  </div>
              </div>
          </div>
      <?php endforeach; ?>

</main>

<?php include "footer.php" ?>
