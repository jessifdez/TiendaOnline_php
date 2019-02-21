<!DOCTYPE HTML>
<html> 
<head>
<title>Comprar</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head> 
<body>
 <?php //ACTUALIZAMOS EL STOCK CADA VEZ QUE COMPRAMOS UN ARTÍCULO
include 'variables_local.php';
include 'funciones.php';
actualizarStock();
mostrarProductos();
?>
</body>
</html>