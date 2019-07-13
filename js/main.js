
function comprobar() {

	
	
	var s2 = validar_passwd1();

	return s1 && s2;
}

    



function validar_passwd1() {
	var pass1 = document.getElementById("pass").value;
        pass1= pass1.trim();
	var pass2 = document.getElementById("pass2").value;
        pass2=pass2.trim();
	var msj = document.getElementById("msj-pass");
	var msj1 = document.getElementById("msj-pass2");

	var expresion = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{3,6}$/;
	
	
if (expresion.test(pass1) && expresion.test(pass2)) {
	if (pass1 == "" && pass2 == "") {
		msj.className = "error";
		msj1.className = "error";
 		msj.innerHTML = "Este campo no puede estar vacio";
 		msj1.innerHTML = "Este campo no puede estar vacio";
 		return false;
	}else{

 	if (pass1 == pass2){
 		
 		return true;
 	}else{
 		msj.className = "error";
 		msj1.className = "error";
 		msj.innerHTML = "Las contraseñas no coinciden";
 		msj1.innerHTML = "Debe ingresar la misma contraseña anterior";
 		return false;
 		}
	
	}
}else{
	msj.className = "error";
	msj.innerHTML = "La contraseña debe tener de 3 a 6 caracteres, 1 mayuscula y 1 minuscula y un digito";
	msj1.className = "error";
	msj1.innerHTML = "La contraseña debe tener de 3 a 6 caracteres, 1 mayuscula y 1 minuscula y un digito";
	return false;
}
 
	


}