document.getElementById("table_generate").addEventListener("click", generate_table);
document.getElementById("new_activity").addEventListener("click", new_activity);
//inicializo count para id de input 
var count = 0;

//funcion base que arma el thead
function generate_table(){
    if(document.getElementById("cronograme"))
    {
        tbl = document.getElementById("cronograme");
        tbl.parentNode.removeChild(tbl);
    }

    //obtengo la duracion 
    var duration = document.querySelector("#duracion_del_proyecto").value;
    //si el campo de duracion esta vacio o negativo
    if(duration.length == 0 || duration < 1) {
        alert("Debe añadir una duración de proyecto valida.");
        return false;
    }
    //solo se puede ejecutar una vez
    // e.target.removeEventListener(e.type, generate_table);
    document.getElementById("table_generate").value="Refrescar tabla";

    // Obtener la referencia del elemento donde mostrare la tabla
    var cronograme = document.querySelector("#cronograme_table");
    


    // Crea un elemento <table>,<thead> y un elemento <tbody>
    var tabla   = document.createElement("table");
    tabla.id = "cronograme";
    tabla.className="table table-bordered";    
    var thead = document.createElement("thead");
    var tblBody = document.createElement("tbody");


    // ------------------ Encabezado de actividades ------------------
    //creo tr del thead
    var tr_thead = document.createElement("tr");
    //creo td donde pondre el texto
    var th = document.createElement("th");
    th.className = "text-center success";
    //creo el texto
    var texto_thead = document.createTextNode("Actividades");
    //añado el texto al th
    th.appendChild(texto_thead);
    //añado el th al tr
    tr_thead.appendChild(th);
    //añado el tr al thead
    thead.appendChild(tr_thead);

    //for para los meses (inicializo i en 0 para mostrar mes 1)
    for (var i = 1; i <= duration; i++) {
        // Crea las hileras de la tabla
        

        var th = document.createElement("th");
        th.className = "text-center success";
        var texto_thead = document.createTextNode("Mes " + i);

        th.appendChild(texto_thead);
        tr_thead.appendChild(th);
            
    }
    //añado el thead a la tabla
    tabla.appendChild(thead);
    // ------------------ Fin encabezado de actividades ------------------
    
    //llamo a la funcion para crear el tbody y lo agrego al tr y a la tabla
    tr_mes= contenido(duration);
    tblBody.appendChild(tr_mes);

    //añado el tbody a la tabla y inserto la tabla al div
    tabla.appendChild(tblBody);
    cronograme.appendChild(tabla);
    var new_activity = document.getElementById("new_activity");
    new_activity.style.display="inline";
}

//funcion que arma el tbody
function contenido(duration){
    // For para los td del contenido
    var tr_mes = document.createElement("tr");
    tr_mes.className = "activity";
    count ++;
    for (var j = 0; j <= duration; j++) {
        
        var celda = document.createElement("td");
        
        //si es la primera iteracion inserto un input sino un checkbox
        if(j == 0){
            var input_act = document.createElement("input");
            input_act.type = "text";
            input_act.className = "form-control cron";
            input_act.id = "act_"+count;
            input_act.name = "actividades[]";
            input_act.required = true;
            celda.appendChild(input_act);
            tr_mes.appendChild(celda);
        }else{
            var check_act = document.createElement("input");
            check_act.type = "checkbox";
            check_act.name = "act[]";
            check_act.value = "mes_"+j;
            celda.style.textAlign = "center";
            celda.appendChild(check_act);
            tr_mes.appendChild(celda);
        }
        //si el bucle llega a su ultima iteracion creo un boton para eliminar actividad
        if(j == duration){
            var td_accion = document.createElement("td");
            td_accion.className = "btn-group";
            var btn_accion = document.createElement("span");
            // btn_accion.type= "button";
            btn_accion.id = "delete_row";
            // btn_accion.value = "Eliminar actividad";
            btn_accion.className = "glyphicon glyphicon-remove btn btn-danger";
            //funcion para borrar actividad
            btn_accion.onclick= function deleteRow() {
                var row = this.parentNode.parentNode;
                var idx = row.rowIndex;
                var table = row.parentNode.parentNode;
                table.deleteRow(idx);
            };
            td_accion.appendChild(btn_accion);
            tr_mes.appendChild(td_accion);

        }
        
    }
    return tr_mes;
}


//funcion para añadir otro tr de actividad
function new_activity(){
    var count_month = document.getElementById("cronograme").querySelectorAll("th").length - 1;
    var duration = document.querySelector("#duracion_del_proyecto").value;
    if(count_month == parseInt(duration))
    {
        var tbodyRef = document.getElementById('cronograme_table').getElementsByTagName('tbody')[0];
        var new_tr = contenido(duration);
        tbodyRef.appendChild(new_tr);
    }else{
        alert("La duracion del proyecto cambio, refresque la tabla");
    }
    
}




