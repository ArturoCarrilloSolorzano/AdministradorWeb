<?php

$Nombre = $_POST['Nombre'];
$Descripcion = $_POST['Descripcion'];
$Camtidad = $_POST['Camtidad'];
$Precio = $_POST['Precio'];
$NombreFoto = $_POST['NombreFoto'];
$consulta = "INSERT INTO `productos`(`nombre`, `descripcion`, `cantidad`, `precio`, `imgUrl`) VALUES ('$Nombre','$Descripcion','$Camtidad','$Precio','$NombreFoto')";
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