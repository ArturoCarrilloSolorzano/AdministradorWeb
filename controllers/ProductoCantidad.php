<?php
$id= $_POST['id'];
$Cantidad = $_POST['Cantidad'];
$temp;
$consulta = "SELECT cantidad FROM productos WHERE id= '$id'";
				$query_exec = db()->prepare($consulta);
                $query_exec->execute();
                $numeroFilas = $query_exec->fetchAll();
                foreach( $numeroFilas as $row ) {
                    $temp= $row['cantidad'];
                }
                $Cantidad = $Cantidad + $temp;
$consulta = "UPDATE productos SET cantidad = '$Cantidad' WHERE id = '$id'";
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