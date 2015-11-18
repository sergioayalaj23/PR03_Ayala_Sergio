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
			if (!isset($_REQUEST['id'])){
			header("location:perfil.php");
		}else{
			$con = mysqli_connect('localhost', 'root', '', 'bd_recursos');
			$sql = "SELECT * FROM tbl_usuario WHERE id_usuario=$_REQUEST[id]";
			$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos)>0){
				$prod=mysqli_fetch_array($datos);
				?>
			<div id="formulario">
				<form name="usuario" action="modificar.proc.php" method="POST" onSubmit="return avisarUsuario();">
				<input type="hidden" name="id" value="<?php echo $prod['id_usuario']; ?>">
				<b>Nombre Usuario:</b></br></br>
				<input type="text" name="usuario" size="20" maxlength="25" value="<?php echo $prod['usuario']; ?>"></br></br>
				<b>Password:</b></br></br>
				<input type="text" name="pass" size="20" maxlength="25" value="<?php echo $prod['password']; ?>"></br></br>
				<b>Repetir Password:</b></br></br>
				<input type="text" name="repetirPass" size="20" maxlength="25" value="<?php echo $prod['password']; ?>"></br></br>
				<b>Tipo Usuario:</b></br></br>
				<select name="tipo_usuario">
					<option value="" selected>Selecciona el tipo de usuario...</option>
				<?php
					
					$sql = "SELECT * FROM tbl_tipo_usuario";
					$tipos = mysqli_query($con, $sql);

					while ($tipo=mysqli_fetch_array($tipos)){
						if ($tipo['tipo_usuario']=="Root"){

						}else{
						echo "<option value='$tipo[tipo_usuario]'";

						if($tipo['id_tipo_usuario']==$prod['id_tipo_usuario']){
							
						}

						echo ">$tipo[tipo_usuario]</option>";
					}}

				?>
				</select><br/><br/>
				<input type="submit" value="Guardar">
				</form>
				<?php
			} else {
				echo "Usuario con id=$_REQUEST[id] no encontrado!";
			}
			
			mysqli_close($con);
		}
		?>
		
	</div>
	</body>
</html>