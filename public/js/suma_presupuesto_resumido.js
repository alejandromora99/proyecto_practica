var inputs_presupuesto = document.querySelectorAll("#tabla_presupuesto_detallado tbody input[type='number']");

for (var i = 0 ; i < 4; i++) {
    inputs_presupuesto[i].addEventListener('change' , sumar_presupuesto);
 }

function sumar_presupuesto () {
    total = 0;
    for (var i = 0 ; i < 4; i++) {
        if(isNaN(parseInt(inputs_presupuesto[i].value))){inputs_presupuesto[i].value = 0;}
        total = parseInt(inputs_presupuesto[i].value) + total;
    }
    document.getElementById('total_presupuesto').value = total;
}
