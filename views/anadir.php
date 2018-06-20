<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../CSS/select.css">
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
			<div class="col-6"> <select class= "select" name="Categoria">
                <option value="1">Futbol</option>
                <option value="2">Running</option>
                <option value="3">Basquetbol</option>
				<option value="4">Beisbol</option>
                <option value="5">Gimnasio</option>
                <option value="6">Futbol-Americano</option>
				<option value="7">Tenis</option>
                <option value="8">Box</option>
                <option value="9">Playeras</option>
				<option value="10">Chammaras</option>
                <option value="11">Pantalones</option>
                <option value="12">Clazado</option>
				<option value="13">Calzado-Running</option>
                <option value="14">Calzado-Futbol</option>
                <option value="15">Blusas</option>
				<option value="16">Tops</option>
                <option value="17">Leggins</option>
                <option value="18">Mochilas</option>
				<option value="19">Accesorios-Gimnasio</option>
                <option value="20">Balones</option>
            </select></div>
			<div class="col-12"><input type="submit" name="siguiente" value="Siguiente"></div>
		</form>

	</div>

</body>
</html>