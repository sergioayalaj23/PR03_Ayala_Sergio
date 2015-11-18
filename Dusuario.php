<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>¡Reserva tu recurso!</title>
	</head>
	<body>
		<?php
			if (!isset($_REQUEST['id'])){
				header("location:perfil.php");
			}else{
			$con = mysqli_connect('localhost', 'root', '', 'bd_recursos');

			$sql = "DELETE FROM tbl_usuario WHERE id_usuario=$_REQUEST[id]";

		
			$datos = mysqli_query($con, $sql);
			
			if(mysqli_affected_rows($con)==1){
				header("location:MDusuario.php");
			} elseif(mysqli_affected_rows($con)==0){
				echo "No se ha eliminado ningún producto por que no existe en la BD";
			} else {
				echo "Ha pasado algo raro";
			}

			mysqli_close($con);
		}
		?>
		<br/><br/>
		<a href="perfil.php">Volver</a>
	</body>
</html>