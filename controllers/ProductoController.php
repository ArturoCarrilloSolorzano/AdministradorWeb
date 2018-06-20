<?php
$id;
$Nombre = $_POST['Nombre'];
$Descripcion = $_POST['Descripcion'];
$Camtidad = $_POST['Cantidad'];
$Precio = $_POST['Precio'];
$NombreFoto = $_POST['NombreFoto'];
$Categoria = $_POST['Categoria'];
$H= "H";
$consulta = "INSERT INTO `productos`(`nombre`, `descripcion`, `cantidad`, `precio`, `imgUrl`) VALUES ('$Nombre','$Descripcion','$Camtidad','$Precio','$NombreFoto')";
				$query_exec = db()->prepare($consulta);
				$query_exec->execute();
$consulta = "SELECT `id` FROM `productos` WHERE nombre = '$Nombre'";
				$query_exec = db()->prepare($consulta);
				$query_exec->execute();
				$numeroFilas = $query_exec->fetchAll();

				if(count($numeroFilas) >= 1)
                        {
                            foreach( $numeroFilas as $row ) {
								$id=$row['id'];
                            }
                        }


$consulta = "INSERT INTO `categorias_productos`(`id_producto`, `id_categoria`, `sexo`) VALUES ('$id','$Categoria','$H')";
				$query_exec = db()->prepare($consulta);
				$query_exec->execute();
                header('Location: ../views/Productos.php');
                
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