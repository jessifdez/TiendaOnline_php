<!DOCTYPE HTML>
<html> 
<head>
<title>Inserte los productos</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head> 
<body>

<form action="tienda_online.html" method="POST">
                <input type="hidden" name="accion" value="volver"/>
                <input type="submit" class="btn btn-success" value="Volver"/>
            </form>
<?php //CREAMOS LA TABLA E INTRODUCIMOS LOS PRODUCTOS
include 'variables_local.php';
include 'funciones.php';
crearTabla();
insertarProductos();
?> 

</body>
</html>