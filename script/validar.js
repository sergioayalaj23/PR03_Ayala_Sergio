function avisarBusqueda(){
			if(document.reservar.recursos.value!=""){
				return true;
			} else {
				alert("Debes seleccionar un recurso");
				return false;
			}
		}	
function avisarUsuario(){
			if(document.usuario.tipo_usuario.value!=""){
				return true;
			} else {
				alert("Debes seleccionar un tipo de usuario");
				return false;
			}
		}	