<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
  <link rel="stylesheet" href="css/shop.css">
  <link rel="stylesheet" href="css/admin.css">
  <title>Adidas Shop</title>
  <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
  <script src="jquery.min.js"></script>
</head>
<body>
  <?php include("header.php"); ?>
  <h2>Inicia Sesión</h2>
  <div class="modal-body">
    <form id="login" action="./include/login.inc.php" method="POST">
      <input type="text" name="username" placeholder="Usuario">
      <br>
      <input type="password" name="pwd" placeholder="Contraseña">
      <br>
      <button type="submit" name="submit" class="lgn">Login</button>
    </form>
  </div>
</body>
</html>