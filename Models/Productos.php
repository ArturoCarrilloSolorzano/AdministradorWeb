<?php
	
	class Productos
	{

		private $connection;

		public $id;
		public $nombre;
		public $descripcion;
		public $cantidad;
		public $precio;
		public $imgUrl;
		public $id_categoria;

		public function __construct()
		{
			try
			{
				$this->connection = Database::startConnection();
			}
			catch(Exception $e)
			{
				die("Hubo un error de base de datos: " . $e->getMessage());
			}
		}

		private function setNames() {
	        return $this->connection->query("SET NAMES 'utf8'");
	    }

	    public function createProductos()
		{
			try
			{
				$this->setNames();
				$columnas = 'nombre, descripcion, cantidad, precio, imgUrl, id_categoria';
	    		$consulta = "INSERT INTO productos (" . $columnas . ") VALUES (?, ?, ?, ?, ?, ?)";
				$query_exec = $this->connection->prepare($consulta);
				$query_exec->execute(array($this->nombre, $this->descripcion, $this->cantidad, $this->precio, $this->imgUrl, $this->id_categoria));
				if($query_exec)
					return true;
				else
					return false;
			}
			catch(Exception $e)
			{
				die("Hubo un error de base de datos: " . $e->getMessage());
			}
		}

		public function readProductos()
		{
			try
			{
				$this->setNames();
				$consulta = "SELECT * FROM productos";
				$query_exec = $this->connection->prepare($consulta);
				$query_exec->execute();
				return $query_exec->fetchAll();
			}
			catch(Exception $e)
			{
				die("Hubo un error de base de datos: " . $e->getMessage());
			}
		}

		public function updateProductos()
		{
			try
	    	{
	    		$this->setNames();
	    		$consulta = "UPDATE productos SET 
	    						nombre = ?, descripcion = ?, cantidad = ?, precio = ?, 
	    						imgUrl = ?, id_usuario = ?
    						 WHERE id = ?";
				$query_exec = $this->connection->prepare($consulta);
				$query_exec->execute(array($this->nombre, $this->descripcion, $this->cantidad, $this->precio, $this->imgUrl, $this->id_categoria, $this->id));
				if($query_exec)
					return true;
				else
					return false;
	    	}
	    	catch(Exception $e)
	    	{
	    		die("Hubo un error de base de datos: " . $e->getMessage());
	    	}
		}

		public function deleteProductos()
		{
			try
	    	{
	    		$this->setNames();
	    		$consulta = "DELETE FROM productos WHERE id = ?";
				$query_exec = $this->connection->prepare($consulta);
				$query_exec->execute(array($this->id));
				if($query_exec)
					return true;
				else
					return false;
	    	}
	    	catch(Exception $e)
	    	{
	    		die("Hubo un error de base de datos: " . $e->getMessage());
	    	}
		}

		public function getProductos($id)
		{
			try
			{
				$this->setNames();
				$consulta = "SELECT * FROM productos WHERE id = ? LIMIT 1";
				$query_exec = $this->connection->prepare($consulta);
				$query_exec->execute(array($id));
				return $query_exec->fetch(PDO::FETCH_ASSOC);
			}
			catch(Exception $e)
			{
				die("Hubo un error de base de datos: " . $e->getMessage());
			}
		}

		public function getByCategory($cat, $sexo)
		{
			$this->setNames();
			$consulta = "SELECT productos.*, categorias.nombre AS nombre_cat 
						FROM productos, categorias_productos, categorias WHERE 
						productos.id = categorias_productos.id_producto AND 
						categorias_productos.id_categoria = categorias.id AND 
						categorias.nombre = ? AND (categorias_productos.sexo = ? OR 
						categorias_productos.sexo = 'U')";
			$query_exec = $this->connection->prepare($consulta);
			$query_exec->execute(array($cat, $sexo));
			if($query_exec)
				return $query_exec->fetchAll();
			else
				return false;
		}

	}

?>