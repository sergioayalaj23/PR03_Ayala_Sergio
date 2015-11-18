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
	<?php
		if ($pro0['id_tipo_usuario']==2){
			header("location:perfil.php");
		}else{
			?>
	<div id="formulario">
		<form name="usuario" action="Ausuario.proc.php" method="POST" onSubmit="return avisarUsuario();">
			<input type="text" name="usuario" size="12" maxlength="15" placeholder="Nombre usuario" >
			<br/><br/>
			<input type="password" name="pass" size="10" maxlength="20" placeholder="Password" >
			<br/><br/>
			<input type="password" name="repetirPass" size="22" maxlength="20" placeholder="Vuelve a escribir el Password" >
			<br/><br/>
			<select name="tipo_usuario">
							<option value="">Selecciona el tipo de usuario...</option>
							<?php
								include('login.php');
								$sql = mysqli_query($con, "SELECT * FROM tbl_tipo_usuario");
								while($dato=mysqli_fetch_array($sql)) {
									if($dato['tipo_usuario']=="Root"){

									}else{
								echo "<option value=\"$dato[id_tipo_usuario]\">$dato[tipo_usuario]</option>";
								}}
								mysqli_close($con);
								?>
						</select>
			<br/><br/>
			<input type="submit" value="Enviar" id="boton">
		
			<a href="perfil.php" id="boton">Volver</a>
			</form>
	</div>
	<?php
}
?>
</body>
</html>