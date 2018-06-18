<?php
$id= $_POST['id'];
$Nombre = $_POST['Nombre'];
$Descripcion = $_POST['Descripcion'];
$Cantidad = $_POST['Cantidad'];
$Precio = $_POST['Precio'];
$NombreFoto = $_POST['NombreFoto'];
$consulta = "UPDATE productos SET nombre = '$Nombre' , descripcion = '$Descripcion' , cantidad = '$Cantidad', precio = '$Precio',imgUrl = '$NombreFoto' WHERE id =' $id'";
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