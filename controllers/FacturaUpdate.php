<?php
$id= $_POST['id'];
$Estado = $_POST['Estado'];
$consulta = "UPDATE facturas SET estado = '$Estado'  WHERE id =' $id'";
				$query_exec = db()->prepare($consulta);
                $query_exec->execute();
                header('Location: ../views/facturas.php');
                
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