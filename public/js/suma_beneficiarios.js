var inputs_beneficiarios_directos = document.querySelectorAll("#tabla_beneficiarios_directos tbody input[type='number']");

for (var i = 0 ; i < 2; i++) {
    inputs_beneficiarios_directos[i].addEventListener('change' , sumar_beneficiarios_directos);
 }

function sumar_beneficiarios_directos () {
    total_directos = 0;
    for (var i = 0 ; i < 2; i++) {
        if(isNaN(parseInt(inputs_beneficiarios_directos[i].value))){inputs_beneficiarios_directos[i].value = 0;}
        total_directos = parseInt(inputs_beneficiarios_directos[i].value) + total_directos;
    }
    document.getElementById('beneficiario_directo_total').value = total_directos;
}


var inputs_beneficiarios_indirectos = document.querySelectorAll("#tabla_beneficiarios_indirectos tbody input[type='number']");

for (var i = 0 ; i < 2; i++) {
    inputs_beneficiarios_indirectos[i].addEventListener('change' , sumar_beneficiarios_indirectos);
 }

function sumar_beneficiarios_indirectos () {
    // var inputs_presupuesto2 = document.querySelectorAll("#tabla_presupuesto_detallado tbody input[type='number']");
    total_indirectos = 0;
    for (var i = 0 ; i < 2; i++) {
        if(isNaN(parseInt(inputs_beneficiarios_indirectos[i].value))){inputs_beneficiarios_indirectos[i].value = 0;}
        total_indirectos = parseInt(inputs_beneficiarios_indirectos[i].value) + total_indirectos;
    }
    document.getElementById('beneficiario_indirecto_total').value = total_indirectos;
}

