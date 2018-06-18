<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<?php include("banner.php"); ?>
	<div class="login login-box">

		<div class="login-triangle"></div>
		<h2 class="login-header">AÑADA UN PRODUCTO</h2>

		<form method="post" action="../controllers/ProductoController.php" class="login-container">
			<div class="col-6">
				<input type="text" name="Nombre" placeholder="Nombre" pattern="[A-Za-z]+" required="true">
			</div>
			<div class="col-6"><input type="text" name="Descripcion" placeholder="Descripcion" pattern="[A-Za-z]+" required="true"></div>
			<div class="col-6"><input type="text" name="Cantidad" placeholder="Cantidad" required="true"></div>
			<div class="col-6"><input type="text" name="Precio" placeholder="Precio" required="true"></div>
			<div class="col-6"><input type="text" name="NombreFoto" placeholder="Nombre foto" required="true"></div>
			<div class="col-12"><input type="submit" name="siguiente" value="Siguiente"></div>
		</form>

	</div>

</body>
</html>