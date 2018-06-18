<?php
        $user;
        $contrasena;
        $connection;
        $error = array();
		session_start();
            try
			{
                $connection=db();
				if (!isset($_SESSION))
				{
					session_start();
				}
				if (isset($_POST['ingresar']))
				{
					login();
				}
			}
			catch(Exception $e)
			{
				die("Ocurrió un error en el sistema: " . $e->getMessage());
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
        
         function login()
         {
            try
			{
                global $connection;
				$nombreUsuario = $_POST['usuario'];
				$contrasena = $_POST['contrasena'];
				$consulta = "SELECT * FROM cuentas WHERE nombreUsuario = ? AND contrasena = ? AND tipoCuenta = 'Administrador'";
				$query_exec = $connection->prepare($consulta);
				$query_exec->execute(array($nombreUsuario, $contrasena));
                $numeroFilas = $query_exec->fetchAll();
				if(count($numeroFilas) == 1)
				{
					$usuario = $nombreUsuario;
                    $_SESSION['nombre_usuario'] = $usuario;
                    $_SESSION['pdo']=$connection;
                    header('Location: ../views/Productos.php');
				}
				else 
				{
                    $error[] = 'Usuario y/o contraseña no válidos';
                    header('Location: ../views/Login.php');
				}
			}
			catch(Exception $e)
			{
				die("Hubo un error de base de datos: " . $e->getMessage());
			}
         }


		
    
?>