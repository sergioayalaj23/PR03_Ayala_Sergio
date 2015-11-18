<?php
include('sesion.php');
$con = mysqli_connect('localhost','root','','bd_recursos');
	$sql = "SELECT * FROM tbl_usuario WHERE id_usuario=$login_sesion";
	$datos = mysqli_query($con, $sql);
	if (mysqli_num_rows($datos) == 1) {
	$pro = mysqli_fetch_array($datos);
	$nombre_usuario=$pro['usuario'];
}else{

	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>¡Reserva tu recurso!</title>
	<link rel="stylesheet" href="css/style2.css">
	<script type="text/javascript" src="script/validar.js"></script>
</head>
<body>
	<div id="wrapper">
		<nav>
			<?php 
				echo "Bievenido ".$nombre_usuario." <a href='logout.php'>| Log Out</a>";
			 ?>
		</nav>
		<div id="options">
			<section class="type1">
				<p><a href="#reservar">Reservar producto</a></p>
			</section>
			<div id="divimagen">
            <img src="img/humanos.jpg">
            </div>
			<section class="type1">
				<p><a href="misarticulos.php">Mis productos</a></p>
			</section>
			<?php
			$admin= "SELECT * FROM tbl_usuario WHERE id_usuario=$_SESSION[login_user]";
			$user = mysqli_query($con, $admin);
			$proU = mysqli_fetch_array($user);
			if ($proU['id_tipo_usuario']=="1" || $proU['id_tipo_usuario']=="3"){
				?>
			<section class="type1">
				<p><a href="#usuarios">Administrar Usuarios</a></p>
			</section>
			<?php
				}
				?>
            
		</div>

<div id="usuarios" class="modalmask">
			<div class="modalbox1 movedown" id="mostrarUsuario">
				
	                <a href="#close" class="boxclose"><img src="img/close.png" alt=""></a>
	                <h2 id="tituloUsuario">Selecciona lo que deseas realizar:</h2>
	                <div id="contenidoUsuarios">
		                </br>
						<p>
						<a href="Ausuario.php" id="boton">Ingresar nuevo usuario</a>
						<a href="MDusuario.php" id="boton">Modificar/Eliminar usuario</a>
						</p>

				</form>
            		</div>
			</div>
		</div>
		


		<div id="reservar" class="modalmask">
			<div class="modalbox movedown" id="resultadoContent">
				<form name="reservar" action="reservar.php" method="POST" onSubmit="return avisarBusqueda();">
	                <a href="#close" class="boxclose"><img src="img/close.png" alt=""></a>
	                <h2 id="tituloReserva">Reservar producto</h2>
	                <div id="contenidoRecursos">
		                <select name="recursos">
							<option value="" selected>Selecciona un recurso...</option>
								<?php
								include('login.php');
								$sql = mysqli_query($con, "SELECT * FROM tbl_tipo_recurso");
								while($dato=mysqli_fetch_array($sql)) {
								echo "<option value=\"$dato[id_tipo_recurso]\">$dato[nombre_tipo_recurso]</option>";
								}
								mysqli_close($con);
								?>
						</select>
						<p><input type="submit" value="Buscar"></p>
				</form>
            		</div>
			</div>
		</div>	

</body>
</html>