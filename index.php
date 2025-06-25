<?php
require "pdo.php";

$sql = "SELECT * FROM bd";
$stmt = $pdo->prepare($sql);
$stmt->execute();
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
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</head>
<body>

<h1>Mes albums</h1>

      <?php foreach ($bd as $item) : ?>
            <div class="d-flex">
                  <div>
                        <img src="assets/images/<?php echo $item["image"] ?>">
                  </div>
                  <div class="d-flex flex-column justify-content-between">
                        <div>
                        <h2><?php echo $item["title"] ?></h2>
                        <p><?php echo $item["description"] ?></p>
                        </div>
                        <div class="text-end">
                              <a href="#">voir</a>
                              <a href="#">supprimer</a>
                        </div>
                  </div>
            </div>
      <?php endforeach; ?>
</body>
</html>
