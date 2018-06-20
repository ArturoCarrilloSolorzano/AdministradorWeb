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
			<h1 align="center">Facturas</h1>
        </div>
        <table class="table-fill">
        <tr>
        <th class="text-left">ID</th>
        <th class="text-left">USUARIO</th>
        <th class="text-left">TOTAL</th>
        <th class="text-left">FECHA PEDIDO</th>
        <th class="text-left">FECHA ENTREGA</th>
        <th class="text-left">ESTADO</th>
        </tr>
        <tbody class="table-hover">
            <?php
                        $estado;
                        session_start();
                        $consulta = "SELECT facturas.id, usuarios.nombres, facturas.total, facturas.fechapedido, facturas.fechaentrega, facturas.estado  FROM usuarios, facturas WHERE facturas.id_usuario = usuarios.id";
                        $query_exec = db()->prepare($consulta);
                        $query_exec->execute();
                        $numeroFilas = $query_exec->fetchAll();
                        if(count($numeroFilas) >= 1)
                        {
                            foreach( $numeroFilas as $row ) {
                                switch($row['estado'])
                                {
                                    case -1:
                                        $estado= "Proxima";
                                    break;
                                    
                                    case 0:
                                        $estado= "Completa";
                                    break;

                                    case 1:
                                        $estado= "Vencida";
                                    break;
                                }
                                echo "<tr><td class='text-left'><a href= cambio.php?id='{$row['id']}'>{$row['id']}</a></td> ".
                                "<td class='text-left'><a href= cambioFactura.php?id='{$row['id']}'>{$row['nombres']}</a> </td> ".
                                "<td class='text-left'><a href=cambioFactura.php?id='{$row['id']}'>{$row['total']}</a> </td> ".
                                "<td class='text-left'><a href=cambioFactura.php?id='{$row['id']}'>{$row['fechapedido']}</a> </td> ".
                                "<td class='text-left'><a href=cambioFactura.php?id='{$row['id']}'>{$row['fechaentrega']}</a> </td> ".
                                "<td class='text-left'><a href=cambioFactura.php?id='{$row['id']}'>$estado</td></tr>";
                            }
                        }
                        else
                        {
                            echo("<tr><td>No hay facturas registradas<td></tr>");
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