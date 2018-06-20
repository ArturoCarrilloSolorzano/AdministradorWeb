<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="../CSS/select.css">
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
<?php include("banner.php"); ?>
<?php 
 GLOBAL $id;
 GLOBAL $nombre;
 GLOBAL $descripcion;
 GLOBAL $cantidad;
 GLOBAL $precio;
 GLOBAL $img;
$busqueda= $_GET['id'];
$consulta = "SELECT * FROM productos WHERE id = $busqueda";
$query_exec = db()->prepare($consulta);
$query_exec->execute();
$numeroFilas= $query_exec->fetchAll();
if(count($numeroFilas) >= 1)
{
    foreach( $numeroFilas as $row ) {
        $id=$row['id'];
        $nombre=$row['nombre'];
        $descripcion=$row['descripcion'];
        $cantidad=$row['cantidad'];
        $precio=$row['precio'];
        $img=$row['imgUrl'];
    }
}

function db()
        {
         static $host = 'localhost';

		static $dbname = 'tienda';

		static $user = 'root';

		static $password = '';
			$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname.'',$user,$password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		
        }

?>
	<div class="login login-box">

		<div class="login-triangle"></div>
		<h2 class="login-header">CAMBIE UN PRODUCTO</h2>

		<form method="post" action="../controllers/ProductoUpdate.php" class="login-container">
			<div class="col-6">
				Nombre<input type="text" name="Nombre" placeholder="Nombre"  value="<?php echo($nombre) ?>" required="true">
            </div>
            <input type="hidden" name="id" value="<?php echo($id) ?>">
			<div class="col-6">Descripcion<input type="text" name="Descripcion" placeholder="Descripcion"  value="<?php echo($descripcion) ?>" required="true"></div>
			<div class="col-6">Cantidad<input type="text" name="Cantidad" placeholder="Cantidad" value="<?php echo($cantidad)?>" required="true"></div>
			<div class="col-6">Precio<input type="text" name="Precio" placeholder="Precio" value="<?php echo($precio) ?>" required="true"></div>
			<div class="col-6">Nombre Foto<input type="text" name="NombreFoto" placeholder="Nombre foto" value="<?php echo($img) ?>" required="true"></div>
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