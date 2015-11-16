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
			$sql = "SELECT *
        FROM tbl_reserva
        INNER JOIN tbl_usuario on tbl_usuario.id_usuario = tbl_reserva.id_usuario
        INNER JOIN tbl_recurso on tbl_recurso.id_recurso = tbl_reserva.id_recurso
        WHERE tbl_usuario.id_usuario=$_SESSION[login_user]
        ";
			$datos = mysqli_query($con,$sql);


			if(mysqli_num_rows($datos)>0){
		?>
			<table>
				<tr>
					<th>Usuario</th>
					<th>Recurso</th>
					<th>Foto</th>
					<th>Liberar</th>
				</tr>

		<?php

			while($pro = mysqli_fetch_array($datos)) {
		 	echo "<tr><td>";
	     
	      	echo utf8_encode("$pro[usuario]</br></td>"); 
	      	echo utf8_encode("<td>$pro[nombre_recurso]</br></td>");
	      	$fichero="img/$pro[foto_recurso]";
	      	if(file_exists($fichero)){
			echo "</td><td></p><img id='img2' src='$fichero'>";
			}

	      	
	        
		 	if ($pro['estado'] == "No disponible") {
				echo "<td><a href='liberar.php?id=$pro[id_recurso]'><img src='img/liberar.png'></a></td></tr>";
			}
		 	}
						
		 ?>
			</table>
		<?php
			}
			else {
				echo "<p id='msg'>No tienes ningun recurso reservado</p>";
			}
			mysqli_close($con);

		?>
			<p><a href="perfil.php" id="boton">Volver</a></p>
	</div>
</body>
</html>