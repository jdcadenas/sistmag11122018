
function validaForm(){
    // Campos de texto
    if($("#cedula").val() == ""){
        alert("El campo Cédula no puede estar vacío.");
        $("#cedula").focus(); // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }

    if($("#nombre").val() == ""){
        alert("El campo Nombre no puede estar vacío.");
        $("#nombre").focus(); // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }
    if($("#apellidos").val() == ""){
        alert("El campo Apellidos no puede estar vacío.");
        $("#apellidos").focus();
        return false;
    }
    if($("#correo").val() == ""){
        alert("El campo Correo no puede estar vacío.");
        $("#correo").focus(); // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }
    if($("#direccion").val() == ""){
        alert("El campo Dirección no puede estar vacío.");
        $("#direccion").focus();
        return false;
    }
    if($("#ocupacion").val() == ""){
        alert("El campo Ocupación no puede estar vacío.");
        $("#ocupacion").focus(); // Esta función coloca el foco de escritura del usuario en el campo Nombre directamente.
        return false;
    }

    // Selectpicker
    if(!$("#estado").is(":selectpicker")){
        alert("Debe elegir un Estado");
        return false;
    }
    if(!$("#municipio").is(":selectpicker")){
        alert("Debe elegir un Municipio");
        return false;
    }
    if(!$("#parroquia").is(":selectpicker")){
        alert("Debe elegir una Parroquia");
        return false;
    }
    if(!$("#tlfmovil").is(":selectpicker")){
        alert("Debe elegir un teléfono de contacto");
        return false;
    }

    return true; // Si todo está correcto
}


$(document).ready( function() {   // Esta parte del código se ejecutará automáticamente cuando la página esté lista.
    $("#botonenviar").click( function() {   // Con esto establecemos la acción por defecto de nuestro botón de enviar.
        if(validaForm()){                  // Primero validará el formulario.
            $.post("enviar.php",$("#form_registro").serialize(),function(res){
                $("#formulario").fadeOut("slow");   // Hacemos desaparecer el div "formulario" con un efecto fadeOut lento.
                if(res == 1){
                    $("#exito").delay(500).fadeIn("slow");  // Si hemos tenido éxito, hacemos aparecer el div "exito" con un efecto fadeIn lento tras un delay de 0,5 segundos.
                } else {
                    $("#fracaso").delay(500).fadeIn("slow"); // Si no, lo mismo, pero haremos aparecer el div "fracaso"
                }
            });
        }
    });    
});












