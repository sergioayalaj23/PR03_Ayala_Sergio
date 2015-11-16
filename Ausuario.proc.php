<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>¡Reserva tu recurso!</title>
	</head>
	<body>
		<?php
			
			$con = mysqli_connect('localhost', 'root', '', 'bd_recursos');
			$sql = "INSERT INTO tbl_usuario (usuario, password, tipo_usuario) VALUES ('$_REQUEST[usuario]', '$_REQUEST[pass]', '$_REQUEST[tipo_usuario]')";

			$verificar = "SELECT * FROM tbl_usuario WHERE usuario = '$_REQUEST[usuario]'";
 			$usu = mysqli_query($con, $verificar);
 if( mysqli_num_rows($usu) != 0){
				echo "Este usuario ya esta registrado, porfavor regresa y registrate con otro nombre";;
				?>
				<p><a href="perfil.php" id="boton">Volver</a></p>
					<?php
				}else{
					
					$datos = mysqli_query($con, $sql);
					header("location: index.php");
				}
				
			
			

			
		?>
	</body>
</html>