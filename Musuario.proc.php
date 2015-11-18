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
			if (!isset($_REQUEST['id'])){
				header("location:perfil.php");
			}else{
				$con = mysqli_connect('localhost', 'root', '', 'bd_recursos');
			$sql = "UPDATE tbl_usuario SET usuario='$_REQUEST[usuario]', password='$_REQUEST[pass]', id_tipo_usuario=$_REQUEST[tipo_usuario] WHERE id_usuario=$_REQUEST[id]";
			echo $sql;

			$datos = mysqli_query($con, $sql);

			header("location: index.php");
		}
		?>
		</br></br>
				
	</div>
</body>
</html>