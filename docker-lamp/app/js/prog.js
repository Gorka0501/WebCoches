function setFechaMaxR(){
    document.forms["registerI"]["fNaciR"].setAttribute("max", fechaHoy(-16));
}
function setFechaMaxD(){
    document.forms["cambio"]["fNaciC"].setAttribute("max", fechaHoy(-16));
}
function setFechasAlquiler(){
    document.forms["alquilar"]["fInicio"].setAttribute("min",fechaHoy(0));
}
function setFechasAlquilerFin(){
    document.forms["alquilar"]["fFinal"].setAttribute("min",document.forms["alquilar"]["fInicio"].value);
}
function fechaHoy(anoE){
    var today = new Date();
    var dia = today.getDate();
    var mes = today.getMonth() + 1;
    var ano = today.getFullYear();
    if (dia < 10) {
    dia = '0' + dia;
    }
    if (mes < 10) {
    mes = '0' + mes;
    }       
    today = ano + anoE + '-' + mes + '-' + dia;
    return(today)
}
function bPasarRegister(){
    document.getElementById('loginI').style.display='none';
    document.getElementById('registerI').style.display='block';
}
    
function bPasarLogin(){
    document.getElementById('loginI').style.display='block';
    document.getElementById('registerI').style.display='none';
}
function comprobarDNI(dni){
    var letrasDNI = "TRWAGMYFPDXBNJZSQVHLCKE";
    var numero = dni.substring(0, 9);
    var result = parseInt(numero,10) % 23;
    if(dni.length != 9){
        alert ("El DNI debe consistir de 8 números y una letra")
        return false;  
    }
    if(letrasDNI.charAt(result) != dni.substring(8,10).toUpperCase()){
        alert("La letra del DNI no es correcta");
        return false;
    }
    return true;
}
function comprobarNombre(nombre){
    if(!nombre.match(/^[a-zA-ZáÁéÉíÍóÓúÚüÜñÑçÇ]+$/)){
        alert("El nombre no puede contener caracteres esapeciales ni números");
        return false;
    }
    return true
}
function comprobarApellidos(apellidos){
    if((!apellidos.match(/^[a-zA-Z" "áÁéÉíÍóÓúÚüÜñÑçÇ]+$/))){
        alert("Los apellidos no puede contener caracteres esapeciales ni números");
        return false;
    }
    return true;
}
function comprobarTelefono(tlf){
    if(!tlf.match(/^[0-9]*$/) ){
    	alert("El telefono solo puede tener numeros.");
        return false;
    }
    if(tlf.length != 9 ){
    	alert("El numero de cifras del telefono no es 9.");
        return false;
    }
    return true
}
function comprobarEmail(email){
    if(!(email.includes("@") && email.includes("."))){
    	alert("El email es incorrecto.");
        return false;
    }
    return true;
}
function comprobarFecha(fecha){
    if(fecha == ""){
        alert("Introduce una fecha");
        return false;
    }
    return true
}
function comprobarContrasena(contrasena){
    if(contrasena.length < 4){
        alert("La contraseña tiene que tener un mínimo de 4 caracteres");
        return false;
    }
    if(contrasena.length > 20){
        alert("La contraseña puede tener un máximo de 20 caracteres");
        return false
    }
    if(!contrasena.match(/^[a-zA-Z0-9]+$/)){
        alert("Introduce una contraseña solo con numeros y letras");
        return false;
    }
    return true;
}
function comprobarContrasenasCoinciden(contrasena1,contrasena2){
    if (!comprobarContrasena(contrasena1)){
        return false;
        
    }else{
        if(!(contrasena1 == contrasena2)){
            alert("Las contraseñas no coinciden");
            return false;
        }
    }
    return true
}

function compRegistrar(){
    var nombreR = document.forms["registerI"]["nombreR"].value;
    var dniR = document.forms["registerI"]["dniR"].value;
    var apellidosR = document.forms["registerI"]["apellidosR"].value;
    var tlfR = document.forms["registerI"]["tlfR"].value;
    var emailR = document.forms["registerI"]["emailR"].value;
    var fNaciR = document.forms["registerI"]["fNaciR"].value;
    var contrasena1R = document.forms["registerI"]["contrasena1R"].value;
    var contrasena2R = document.forms["registerI"]["contrasena2R"].value;
 
    if (!comprobarDNI(dniR)){
        return false;
    }
    if (!comprobarNombre(nombreR)){
        return false;
    }
    if (!comprobarApellidos(apellidosR)){
        return false;
    }
    if (!comprobarTelefono(tlfR)){
        return false;
    }
    if (!comprobarEmail(emailR)){
        return false;
    }
    if (!comprobarFecha(fNaciR)){
        return false
    }
    if (!comprobarContrasenasCoinciden(contrasena1R,contrasena2R)){
        return false
    }
    return true
}
function compLogin(){
    var dniL = document.forms["loginI"]["dniL"].value;
    var contrasenaL = document.forms["loginI"]["contrasenaL"].value;

    if (!comprobarDNI(dniL)){
        return false;
    }
    if (!comprobarContrasena(contrasenaL)){
        return false
    }
    return true

}
function compCambio(){
    var nombreC = document.forms["cambio"]["nombreC"].value;
    var dniC = document.forms["cambio"]["dniC"].value;
    var apellidosC = document.forms["cambio"]["apellidosC"].value;
    var tlfC = document.forms["cambio"]["tlfC"].value;
    var emailC = document.forms["cambio"]["emailC"].value;
    var fNaciC = document.forms["cambio"]["fNaciC"].value;
    var contrasena1C = document.forms["cambio"]["contrasena1C"].value;
    var contrasena2C = document.forms["cambio"]["contrasena2C"].value;

    if(!nombreC == ""){
        if (!comprobarNombre(nombreC)){
            return false;
        }
    }
    if(!dniC == ""){
        if (!comprobarDNI(dniC)){

            return false;
        }
    }
    if(!apellidosC == ""){
        if (!comprobarApellidos(apellidosC)){
            return false;
        }
    }
    if(!tlfC == ""){
        if (!comprobarTelefono(tlfC)){
            return false;
        }
    }
    if(!emailC == ""){
        if (!comprobarEmail(emailC)){
            return false;
        }
    }
    if(!(contrasena1C == "" && contrasena2C == "")){
        if (!comprobarContrasenasCoinciden(contrasena1C,contrasena2C)){
            return false;
        }
    }
    return true;
}
function comprobarFechas(fInicio,fFin){
    if(Date(fFinal)<Date(fInicio)){
        alert("La fecha de Inicio tiene que ser menor a la de Final")
        return false   
    }
    return true
    
}
function compEliminar(){
    if (confirm("¿Seguro que desea eliminar el coche?")){
    	return true;
    }
    else{return false;}
	
}

function compAlquilar(){
    var fInicio = document.forms["alquilar"]["fInicio"].value;
    var fFin = document.forms["alquilar"]["fFinal"].value;

    if(!comprobarFechas(fInicio,fFin)){
        return false;
    }
    return true;
}


function bPasarAnadir(){
    document.getElementById('lista').style.display='none';
    document.getElementById('anadirCoche').style.display='block';
}
function bPasarVer(){
    document.getElementById('lista').style.display='block';
    document.getElementById('anadirCoche').style.display='none';
}

