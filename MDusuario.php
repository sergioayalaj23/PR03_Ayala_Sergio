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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	</head>
<body>
	<nav>
		<?php 
			echo "Perfil de: ".$nombre_usuario." <a href='logout.php'>| Log Out</a>";
		?>
	</nav>
	<div id="wrapper2">
		<?php

			$sql = "SELECT * FROM tbl_usuario INNER JOIN tbl_tipo_usuario ON tbl_tipo_usuario.id_tipo_usuario=tbl_usuario.id_tipo_usuario";
			$sql1= "SELECT * FROM tbl_usuario WHERE id_usuario=$_SESSION[login_user]";

			$datos = mysqli_query($con, $sql);
			$datos1 = mysqli_query($con, $sql1);
			$usu = mysqli_fetch_array($datos1);
			?>
			<table border>
				<tr>
					<th>Nombre</th>
					<th>Tipo Usuario</th>
					<th>Operaciones</th>
				</tr>

				<?php

				
				while ($prod = mysqli_fetch_array($datos)){
					if ($usu['id_tipo_usuario']=="1"){
						if ($prod['tipo_usuario']=="Root"){
					echo "<td>";

					echo "$prod[usuario]";
					echo "</td><td>";  
					echo "$prod[tipo_usuario]";
					 echo"</td><td>";
					
					
					
						echo "<a href='Musuario.php?id=$prod[id_usuario]'><i style='background-color:white;' class='fa fa-pencil fa-2x fa-pull-left fa-border' title='modificar'></i></a>";
					

					
					
						
					

					
					echo "</td></tr>";

				}else{

					echo "<td>";

					echo "$prod[usuario]";
					echo "</td><td>";  
					echo "$prod[tipo_usuario]";
					 echo"</td><td>";
					
					
					
						echo "<a href='Musuario.php?id=$prod[id_usuario]'><i style='background-color:white;' class='fa fa-pencil fa-2x fa-pull-left fa-border' title='modificar'></i></a>";
					

					
					
						echo "<a href='Dusuario.php?id=$prod[id_usuario]'>";?><i style='background-color:white;' class='fa fa-trash fa-2x fa-pull-left fa-border' title='borrar' onclick="return confirm('¿Seguro que deseas eliminar el usuario?');"><?php "</i></a>";
					

					
					echo "</td></tr>";

				}

					}else if ($usu['id_tipo_usuario']=="3"){
						if ($prod['tipo_usuario']=="Root"){

						}else if ($prod['tipo_usuario']=="Usuario"){
							echo "<td>";

							echo "$prod[usuario]";
							echo "</td><td>";  
							echo "$prod[tipo_usuario]";
					 		echo"</td><td>";
					
				
						echo "<a href='Musuario.php?id=$prod[id_usuario]'><i style='background-color:white;' class='fa fa-pencil fa-2x fa-pull-left fa-border' title='modificar'></i></a>";
					

					
					
						echo "<a href='Dusuario.php?id=$prod[id_usuario]'>";?><i style='background-color:white;' class='fa fa-trash fa-2x fa-pull-left fa-border' title='borrar' onclick="return confirm('¿Seguro que deseas eliminar el usuario?');"><?php "</i></a>";
				
					echo "</td></tr>";
						}else if ($prod['tipo_usuario']=="Administrador"){
							if ($prod['usuario']==$usu['usuario']){
								echo "<td>";

							echo "$prod[usuario]";
							echo "</td><td>";  
							echo "$prod[tipo_usuario]";
					 		echo"</td><td>";
					
				
						echo "<a href='Musuario.php?id=$prod[id_usuario]'><i style='background-color:white;' class='fa fa-pencil fa-2x fa-pull-left fa-border' title='modificar'></i></a>";
					

					
					
						
				
					echo "</td></tr>";
							}
						}
					
				}else{
					header("location:perfil.php");
				}
			}

				?>

			</table>

			

				<?php
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
			<p><a href="perfil.php" id="boton">Volver</a></p>
	</div>
</body>
</html>