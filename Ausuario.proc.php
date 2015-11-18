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
		
		<script type="text/javascript" src="script/validar.js"></script>
	</head>
<body>
	<nav>
		<?php 
			echo "Perfil de: ".$nombre_usuario." <a href='logout.php'>| Log Out</a>";
		?>
	</nav>
	<div id="formulario">
			<?php
			if (!isset($_REQUEST['usuario'])){
				header("location:perfil.php");
			}else{
			$con = mysqli_connect('localhost', 'root', '', 'bd_recursos');
			$sql = "INSERT INTO tbl_usuario (usuario, password, id_tipo_usuario) VALUES ('$_REQUEST[usuario]', '$_REQUEST[pass]', '$_REQUEST[tipo_usuario]')";

			$verificar = "SELECT * FROM tbl_usuario WHERE usuario = '$_REQUEST[usuario]'";
 			$usu = mysqli_query($con, $verificar);
 if( mysqli_num_rows($usu) != 0){
 	?>
				<b>Este usuario ya esta registrado, porfavor regresa y registrate con otro nombre</b>
				
			
					<?php
				}else{
					
					$datos = mysqli_query($con, $sql);
					echo "Usuario creado exitosamente!";
				}}
		?>
		</br></br>
				<p><a href="perfil.php" id="boton">Volver</a></p>
	</div>
</body>
</html>