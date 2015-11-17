function avisarBusqueda(){
			if(document.reservar.recursos.value!=""){
				return true;
			} else {
				alert("Debes seleccionar un recurso");
				return false;
			}
		}	
function avisarUsuario(){
			



if(document.usuario.usuario.value==""){
				alert("Debes introducir el nombre del usuario");
				return false;
			} 
			else if (document.usuario.pass.value=="" || document.usuario.repetirPass.value=="" ){
				alert("Debes introducir el password del usuario");
				return false;
			}else if (document.usuario.pass.value!=document.usuario.repetirPass.value){
				alert("Los passwords no coinciden");
				return false;

			}else if (document.usuario.tipo_usuario.value==""){
				alert("Debes introducir el tipo del usuario");
				return false;
			}
			return true;


		}
			



		