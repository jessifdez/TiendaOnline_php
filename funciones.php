<?php
function crearTabla(){
	//Hacemos las variables globales para que se vean dentro de la funcion
	global $servername,$username,$password,$dbname;
	try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS productos_tienda (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Precio INT(10) NOT NULL,
	Stock INT(10) NOT NULL)";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Tabla creada<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}
function insertarProductos(){
	//Hacemos las variables globales para que se vean dentro de la funcion
	global $servername,$username,$password,$dbname;
	try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$nombre=$_GET["nombre"];
	$precio=$_GET["precio"];
	$stock=$_GET["stock"];
    $sql = "INSERT INTO productos_tienda (Nombre,Precio,Stock) VALUES ('$nombre','$precio','$stock')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Se ha añadido un nuevo producto: ".$nombre;
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}
function mostrarProductos(){
	//Hacemos las variables globales para que se vean dentro de la funcion
	global $servername,$username,$password,$dbname;
	echo "<table class='table'>";
	echo "<tr class='primary'><th>Id</th><th>Nombre</th><th>Precio</th><th>Stock</th><th>Comprar</th></tr>";
	try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql="SELECT * FROM productos_tienda";
    // set the resulting array to associative
    $result = $conn->query($sql);
    $lista_productos=$result->fetchAll();
	for ($i=0; $i<count($lista_productos); $i++)
		{
			$fila=$lista_productos[$i];
			echo('<tr><td>'.$fila['id'].'</td><td>'.$fila['Nombre'].'</td><td>'.$fila['Precio'].'</td><td>'.$fila['Stock'].'</td><td><a href="actualizar_stock.php?id='.$fila['id'].'">Comprar</a></td></tr>');
		}
    }
	catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
	}
	$conn = null;
	echo "</table>";
}
function actualizarStock(){
	//Hacemos las variables globales para que se vean dentro de la funcion
	global $servername,$username,$password,$dbname;
	try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$id=$_GET['id'];
    $sql = "UPDATE productos_tienda SET Stock=Stock-1 WHERE id='$id'";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
   // echo $stmt->rowCount() . " records UPDATED successfully";
    }
	catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
}
?>