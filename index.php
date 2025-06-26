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
      <form method="post" action="login_treatment.php">
            <label for="username"></label>
            <input id="username" type="text" name="username">
            <button type="submit">Log in</button>
      </form>

<?php if(isset($_GET['error']) && $_GET['error'] === '1') : ?>
      <p>Il manque le pseudo !</p>
<?php endif; ?>
</body>
</html>