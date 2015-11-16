<?php  
	include('sesion.php');
	$con = mysqli_connect('localhost', 'root', '', 'bd_recursos');
	$sql0 = "SELECT * FROM tbl_usuario WHERE id_usuario=$login_sesion";
	$datos0 = mysqli_query($con, $sql0);
	if (mysqli_num_rows($datos0) == 1) {
	$pro0 = mysqli_fetch_array($datos0);
	$nombre_usuario=$pro0['usuario'];
}else{

	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>¡Reserva tu recurso!</title>
		<link rel="stylesheet" type="text/css" href="css/style3.css" media="screen" />
	</head>
<body>
	<nav>
		<?php 
			echo "Perfil de: ".$nombre_usuario." <a href='logout.php'>| Log Out</a>";
		?>
	</nav>
	<div id="formulario">
		<form name="usuario" action="Ausuario.proc.php" method="POST">
			<input type="text" name="usuario" size="10" maxlength="15" placeholder="Nombre usuario" required>
			<br/><br/>
			<input type="password" name="pass" size="10" maxlength="20" placeholder="Password" required>
			<br/><br/>
			<select name="tipo_usuario">
							<option value="" disabled>Selecciona un recurso...</option>
							<option value="Usuario" >Usuario</option>
							<option value="Administrador" >Administrador</option>
						</select>
			<br/><br/>
			<input type="submit" value="Enviar">
			</form>
	</div>
</body>
</html>