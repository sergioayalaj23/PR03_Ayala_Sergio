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
	<div id="wrapper2">
		<?php

		$admin= "SELECT * FROM tbl_usuario WHERE id_usuario=$_SESSION[login_user]";
			$user = mysqli_query($con, $admin);
			$proU = mysqli_fetch_array($user);
			if ($proU['id_tipo_usuario']=="1" || $proU['id_tipo_usuario']=="3"){


			$sql = "SELECT *
        FROM tbl_reserva
        INNER JOIN tbl_recurso on tbl_recurso.id_recurso = tbl_reserva.id_recurso
        
        ";
			$datos = mysqli_query($con,$sql);


			if(mysqli_num_rows($datos)>0){
		?>
			<table>
				<tr>
					<th>Veces Usado</th>
					<th>Recurso</th>
					<th>Foto</th>
					<th>Fecha reserva</th>
					<th>Fecha liberado</th>
				</tr>

		<?php

			while($pro = mysqli_fetch_array($datos)) {
		 	echo "<tr><td>";
	     
	      	echo utf8_encode("$pro[veces_usado]</br></td>"); 
	      	echo utf8_encode("<td>$pro[nombre_recurso]</br></td>");
	      	$fichero="img/$pro[foto_recurso]";
	      	if(file_exists($fichero)){
			echo "</td><td></p><img id='img2' src='$fichero'>";
			}
			echo utf8_encode("<td>$pro[ultima_reserva]</br></td>");
			echo utf8_encode("<td>$pro[ultima_liberacion]</br></td>");
			}}
						
		 ?>
			</table>
		<?php
			
			
			mysqli_close($con);
				}else{
					header("location:perfil.php");
				}		

		?>
			<p><a href="perfil.php" id="boton">Volver</a></p>
	</div>
</body>
</html>