<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/table.css">
</head>
<body>
<?php include("banner.php"); ?>
  	<div class="container">
		<div class="font">
			<h1 align="center">Productos</h1>
        </div>
        <table class="table-fill">
        <tr>
        <th class="text-left">ID</th>
        <th class="text-left">NOMBRE</th>
        <th class="text-left">DESCRIPCION</th>
        <th class="text-left">CANTIDAD</th>
        <th class="text-left">PRECIO</th>
        <th class="text-left">IMAGEN</th>
        </tr>
        <tbody class="table-hover">
            <?php
                        session_start();
                        $Busqueda = $_GET['searchbar1'];
                        $consulta = "SELECT * FROM productos WHERE id LIKE '$Busqueda%' OR nombre LIKE '$Busqueda%' OR descripcion LIKE '$Busqueda%' OR cantidad LIKE '$Busqueda%' OR precio LIKE '$Busqueda%'";
                        $query_exec = db()->prepare($consulta);
                        $query_exec->execute();
                        $numeroFilas = $query_exec->fetchAll();
                        if(count($numeroFilas) >= 1)
                        {
                            foreach( $numeroFilas as $row ) {
                                echo "<tr><td class='text-left'><a href= cambio.php?id='{$row['id']}'>{$row['id']}</a></td> ".
                                "<td class='text-left'><a href= cambio.php?id='{$row['id']}'>{$row['nombre']}</a> </td> ".
                                "<td class='text-left'><a href=cambio.php?id='{$row['id']}'>{$row['descripcion']}</a> </td> ".
                                "<td class='text-left'><a href=cambio.php?id='{$row['id']}'>{$row['cantidad']}</a> </td> ".
                                "<td class='text-left'><a href=cambio.php?id='{$row['id']}'>{$row['precio']}</a> </td> ".
                                "<td class='text-left'><a href=cambio.php?id='{$row['id']}'> <img src='{$row['imgUrl']}'></td></tr>";
                            }
                        }
                        else
                        {
                            echo("<tr><td>No hay productos registrados<td></tr>");
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
            </tbody>
        </table>        


            

		</div>
	</div>

</body>
</html>