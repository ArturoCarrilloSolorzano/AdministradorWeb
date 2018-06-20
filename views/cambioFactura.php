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
		<h2 class="login-header">CAMBIE EL ESTADO DE FACTURA</h2>

		<form method="post" action="../controllers/FacturaUpdate.php" class="login-container">
            <input type="hidden" name="id" value="<?php echo($id) ?>">
			<div class="col-6">Estado 
            <select class= "select" name="Estado">
                <option value="-1">Proxima</option>
                <option value="0">Completa</option>
                <option value="1">Vencida</option>
            </select>
            
            </div>
			<div class="col-12"><input type="submit" name="siguiente" value="Siguiente"></div>
		</form>

	</div>

</body>
</html>