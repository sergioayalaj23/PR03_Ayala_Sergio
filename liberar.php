<?php 
	include('login.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>¡Reserva tu recurso!</title>
		<link rel="stylesheet" type="text/css" href="css/style4.css">
		<link rel="stylesheet" type="text/css" href="css/style6.css">
	</head>
<body>
	<div id="wrapper">
		<?php
			$con = mysqli_connect('localhost','root','','bd_recursos');
			$sql = "UPDATE tbl_recurso SET estado='disponible' WHERE id_recurso=$_REQUEST[id]";
			$sql1 = "UPDATE tbl_reserva SET id_usuario=NULL , ultima_liberacion=now() WHERE id_recurso=$_REQUEST[id]";
			
			$datos = mysqli_query($con,$sql);
			$datos1 = mysqli_query($con,$sql1);
			
		?>
			<p>Su recurso se ha liberado correctamente. Muchas gracias</p>
			<p><a href="perfil.php">Volver al Perfil</a></p>
	</div>
</body>
</html>