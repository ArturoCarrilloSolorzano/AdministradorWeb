<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<?php include("banner.php"); ?>
	<div class="login login-box-s">
		<div class="login-triangle"></div>
		<h2 class="login-header">Login</h2>
		<form action="../controllers/AccountController.php" name="miform" method="post"  class="login-container-s">
			<br><p><input type="text" name="usuario" placeholder="User" required="true"></p>
			<br><p><input type="password" name="contrasena" placeholder="Password" required="true"></p>
			<br><p><input type="submit" name="ingresar" value="Iniciar Sesión"></p>
		</form>
	</div>

</body>
</html>