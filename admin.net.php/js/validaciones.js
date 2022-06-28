//cargo
function validarCargo(form) {
    if (form.nombreCargo.value.length == 0) {
        alert("Digite el Nombre del Cargo");
        form.nombreCargo.focus();
        return (false);
    }

    var letras = "abcdefghijklmnñopqrstuvwxyz + ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    var cadena = form.nombreCargo.value;
    var valida = true;
    for (i = 0; i < cadena.length; i++) {
        ch = cadena.charAt(i);
        for (j = 0; j < letras.length; j++)
            if (ch == letras.charAt(j))
                break;
        if (j == letras.length) {
            valida = false;
            break;
            break;
        }

    }
    if (!valida) {
        alert("Digite Solo letras en el campo Nombre del Cargo");
        form.nombreCargo.focus();
        return (false);
    }
    var confirmar = confirm("Desea Realizar Los Cambios [Aceptar] o [Cancelar]");
    if (confirmar == false) {
        return (false);
    }
    return (true);
}
//clientes

function validarCliente(form) {
    if (form.documentoCliente.value.length == 0) {
        alert("Digite el Numero del Documento");
        form.documentoCliente.focus();
        return (false);
    }

    var letras = "1234567890";
    var cadena = form.documentoCliente.value;
    var valida = true;
    for (i = 0; i < cadena.length; i++) {
        ch = cadena.charAt(i);
        for (j = 0; j < letras.length; j++)
            if (ch == letras.charAt(j))
                break;
        if (j == letras.length) {
            valida = false;
            break;
            break;
        }

    }
    if (!valida) {
        alert("Digite Solo numeros en el campo Documento Cliente");
        form.documentoCliente.focus();
        return (false);
    }

    // revisar selects
    if (form.codigoDocumento.value.length == 0) {
        alert("Seleccione el Documento");
        form.codigoDocumento.focus();
        return (false);
    }

    if (form.nombreCliente.value.length == 0) {
        alert("Digite el Nombre del Cliente");
        form.nombreCliente.focus();
        return (false);
    }

    var letras = "abcdefghijklmnñopqrstuvwxyz + ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    var cadena = form.nombreCliente.value;
    var valida = true;
    for (i = 0; i < cadena.length; i++) {
        ch = cadena.charAt(i);
        for (j = 0; j < letras.length; j++)
            if (ch == letras.charAt(j))
                break;
        if (j == letras.length) {
            valida = false;
            break;
            break;
        }

    }
    if (!valida) {
        alert("Digite Solo letras en el campo Nombre del Cliente");
        form.nombreCliente.focus();
        return (false);
    }
    if (form.apellidoCliente.value.length == 0) {
        alert("Digite el Apellido del Cliente");
        form.apellidoCliente.focus();
        return (false);
    }

    var letras = "abcdefghijklmnñopqrstuvwxyz + ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    var cadena = form.apellidoCliente.value;
    var valida = true;
    for (i = 0; i < cadena.length; i++) {
        ch = cadena.charAt(i);
        for (j = 0; j < letras.length; j++)
            if (ch == letras.charAt(j))
                break;
        if (j == letras.length) {
            valida = false;
            break;
            break;
        }

    }
    if (!valida) {
        alert("Digite Solo letras en el campo Apellido del Cliente");
        form.apellidoCliente.focus();
        return (false);
    }

    if (form.telefonoCliente.value.length == 0) {
        alert("Digite el Numero Telefonico");
        form.telefonoCliente.focus();
        return (false);
    }

    var letras = "1234567890";
    var cadena = form.telefonoCliente.value;
    var valida = true;
    for (i = 0; i < cadena.length; i++) {
        ch = cadena.charAt(i);
        for (j = 0; j < letras.length; j++)
            if (ch == letras.charAt(j))
                break;
        if (j == letras.length) {
            valida = false;
            break;
            break;
        }

    }
    if (!valida) {
        alert("Digite Solo numeros en el campo Telefono Cliente");
        form.telefonoCliente.focus();
        return (false);
    }

    if (form.emailCliente.value.length == 0) {
        alert("Digite el Email del Cliente");
        form.emailCliente.focus();
        return (false);
    }

    var letras = "abcdefghijklmnñopqrstuvwxyz + ABCDEFGHIJKLMNÑOPQRSTUVWXYZ+1234567890+@.-_";
    var cadena = form.emailCliente.value;
    var valida = true;
    for (i = 0; i < cadena.length; i++) {
        ch = cadena.charAt(i);
        for (j = 0; j < letras.length; j++)
            if (ch == letras.charAt(j))
                break;
        if (j == letras.length) {
            valida = false;
            break;
            break;
        }

    }
    if (!valida) {
        alert("Digite el Email del Cliente");
        form.emailCliente.focus();
        return (false);
    }
    if (form.Ubicacion.value.length == 0) {
        alert("Digite la Ubicación del Cliente");
        form.Ubicacion.focus();
        return (false);
    }

    var letras = "abcdefghijklmnñopqrstuvwxyz + ABCDEFGHIJKLMNÑOPQRSTUVWXYZ+1234567890+#.-°";
    var cadena = form.Ubicacion.value;
    var valida = true;
    for (i = 0; i < cadena.length; i++) {
        ch = cadena.charAt(i);
        for (j = 0; j < letras.length; j++)
            if (ch == letras.charAt(j))
                break;
        if (j == letras.length) {
            valida = false;
            break;
            break;
        }

    }
    if (!valida) {
        alert("Digite la Ubicación del Cliente");
        form.Ubicacion.focus();
        return (false);
    }

    if (form.contraseña.value.length == 0) {
        alert("Digite la Contraseña del Cliente");
        form.contraseña.focus();
        return (false);
    }

    var letras = "abcdefghijklmnñopqrstuvwxyz + ABCDEFGHIJKLMNÑOPQRSTUVWXYZ+1234567890";
    var cadena = form.contraseña.value;
    var valida = true;
    for (i = 0; i < cadena.length; i++) {
        ch = cadena.charAt(i);
        for (j = 0; j < letras.length; j++)
            if (ch == letras.charAt(j))
                break;
        if (j == letras.length) {
            valida = false;
            break;
            break;
        }

    }
    if (!valida) {
        alert("Digite la Contraseña del Cliente");
        form.contraseña.focus();
        return (false);
    }
    var confirmar = confirm("Desea Realizar Los Cambios [Aceptar] o [Cancelar]");
    if (confirmar == false) {
        return (false);
    }
    return (true);
}
// Contrato Servicios
function validarContrato(form) {
    if (form.numeroContrato.value.length == 0) {
        alert("Digite el Numero del Contrato");
        form.numeroContrato.focus();
        return (false);
    }

    var letras = "1234567890";
    var cadena = form.numeroContrato.value;
    var valida = true;
    for (i = 0; i < cadena.length; i++) {
        ch = cadena.charAt(i);
        for (j = 0; j < letras.length; j++)
            if (ch == letras.charAt(j))
                break;
        if (j == letras.length) {
            valida = false;
            break;
            break;
        }

    }
    if (!valida) {
        alert("Digite Solo Numeros en el campo Contrato");
        form.numeroContrato.focus();
        return (false);
    }
    var confirmar = confirm("Desea Realizar Los Cambios [Aceptar] o [Cancelar]");
    if (confirmar == false) {
        return (false);
    }
    return (true);


}
// Documentos
function validarDocumento(form) {
    if (form.nombreDocumento.value.length == 0) {
        alert("Digite el Nombre del Documento");
        form.nombreDocumento.focus();
        return (false);
    }

    var letras = "abcdefghijklmnñopqrstuvwxyz + ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    var cadena = form.nombreDocumento.value;
    var valida = true;
    for (i = 0; i < cadena.length; i++) {
        ch = cadena.charAt(i);
        for (j = 0; j < letras.length; j++)
            if (ch == letras.charAt(j))
                break;
        if (j == letras.length) {
            valida = false;
            break;
            break;
        }

    }
    if (!valida) {
        alert("Digite Solo letras en el campo Nombre del Documento");
        form.nombreDocumento.focus();
        return (false);
    }
    var confirmar = confirm("Desea Realizar Los Cambios [Aceptar] o [Cancelar]");
    if (confirmar == false) {
        return (false);
    }
    return (true);
}
// Empleados
function validarEmpleado(form) {
    if (form.numeroDocumento.value.length == 0) {
        alert("Digite el Numero del Documento");
        form.numeroDocumento.focus();
        return (false);
    }

    var letras = "1234567890";
    var cadena = form.numeroDocumento.value;
    var valida = true;
    for (i = 0; i < cadena.length; i++) {
        ch = cadena.charAt(i);
        for (j = 0; j < letras.length; j++)
            if (ch == letras.charAt(j))
                break;
        if (j == letras.length) {
            valida = false;
            break;
            break;
        }

    }
    if (!valida) {
        alert("Digite Solo numero en el campo Documento");
        form.numeroDocumento.focus();
        return (false);
    }
    if (form.nombreEmpleado.value.length == 0) {
        alert("Digite el Nombre del Empleado");
        form.nombreEmpleado.focus();
        return (false);
    }

    var letras = "abcdefghijklmnñopqrstuvwxyz + ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    var cadena = form.nombreEmpleado.value;
    var valida = true;
    for (i = 0; i < cadena.length; i++) {
        ch = cadena.charAt(i);
        for (j = 0; j < letras.length; j++)
            if (ch == letras.charAt(j))
                break;
        if (j == letras.length) {
            valida = false;
            break;
            break;
        }

    }
    if (!valida) {
        alert("Digite Solo letras en el campo Nombre ");
        form.nombreEmpleado.focus();
        return (false);
    }

    if (form.apellidoEmpleado.value.length == 0) {
        alert("Digite el Apellido del Empleado");
        form.apellidoEmpleado.focus();
        return (false);
    }

    var letras = "abcdefghijklmnñopqrstuvwxyz + ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    var cadena = form.apellidoEmpleado.value;
    var valida = true;
    for (i = 0; i < cadena.length; i++) {
        ch = cadena.charAt(i);
        for (j = 0; j < letras.length; j++)
            if (ch == letras.charAt(j))
                break;
        if (j == letras.length) {
            valida = false;
            break;
            break;
        }

    }
    if (!valida) {
        alert("Digite Solo letras en el campo Apellido");
        form.apellidoEmpleado.focus();
        return (false);
    }

    if (form.telefonoEmpleado.value.length == 0) {
        alert("Digite el Telefono del Empleado");
        form.telefonoEmpleado.focus();
        return (false);
    }

    var letras = "1234567890";
    var cadena = form.telefonoEmpleado.value;
    var valida = true;
    for (i = 0; i < cadena.length; i++) {
        ch = cadena.charAt(i);
        for (j = 0; j < letras.length; j++)
            if (ch == letras.charAt(j))
                break;
        if (j == letras.length) {
            valida = false;
            break;
            break;
        }

    }
    if (!valida) {
        alert("Digite Solo Numeros en el campo Telefono");
        form.telefonoEmpleado.focus();
        return (false);
    }
    if (form.emailEmpleado.value.length == 0) {
        alert("Digite el Email del Empleado");
        form.emailEmpleado.focus();
        return (false);
    }

    var letras = "abcdefghijklmnñopqrstuvwxyz + ABCDEFGHIJKLMNÑOPQRSTUVWXYZ+1234567890+@.-_";
    var cadena = form.emailEmpleado.value;
    var valida = true;
    for (i = 0; i < cadena.length; i++) {
        ch = cadena.charAt(i);
        for (j = 0; j < letras.length; j++)
            if (ch == letras.charAt(j))
                break;
        if (j == letras.length) {
            valida = false;
            break;
            break;
        }

    }
    if (!valida) {
        alert("Digite Solo Email del Empleado");
        form.emailEmpleado.focus();
        return (false);
    }


    var confirmar = confirm("Desea Realizar Los Cambios [Aceptar] o [Cancelar]");
    if (confirmar == false) {
        return (false);
    }
    return (true);
}
//Servicios Falta por Validación

//Asignacion de Ubicación
function validarUbicacion(form) {
    if (form.Ubicacion.value.length == 0) {
        alert("Digite la ubicación del Empleado");
        form.Ubicacion.focus();
        return (false);
    }

    var letras = "abcdefghijklmnñopqrstuvwxyz + ABCDEFGHIJKLMNÑOPQRSTUVWXYZ+1234567890";
    var cadena = form.Ubicacion.value;
    var valida = true;
    for (i = 0; i < cadena.length; i++) {
        ch = cadena.charAt(i);
        for (j = 0; j < letras.length; j++)
            if (ch == letras.charAt(j))
                break;
        if (j == letras.length) {
            valida = false;
            break;
            break;
        }

    }
    if (!valida) {
        alert("Digite la Ubicación del Empleado");
        form.Ubicacion.focus();
        return (false);
    }
    var confirmar = confirm("Desea Realizar Los Cambios [Aceptar] o [Cancelar]");
    if (confirmar == false) {
        return (false);
    }
    return (true);
}