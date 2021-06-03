document.getElementById("table_activities_generate").addEventListener("click", generate_table_activities);
//funcion base que arma el thead
function generate_table_activities(e){
    if(!document.getElementById("cronograme")){
        alert("Primero debe de crear una tabla para el cronograma.")
    }
    //si la tabla ya existe la borro y la sobreescribo
    if(document.getElementById("activities_detail"))
    {
        tbl = document.getElementById("activities_detail");
        tbl.parentNode.removeChild(tbl);
    }

    // Obtener la referencia del elemento donde mostrare la tabla
    var activities_detail = document.getElementById("activities_table_div");
    // Crea un elemento <table>,<thead> y un elemento <tbody>
    var tabla   = document.createElement("table");
    tabla.id = "activities_detail";
    tabla.className="table table-bordered";    
    var thead = document.createElement("thead");
    var tbody = document.createElement("tbody");

    //------------------ contenido del head ------------------
    tr_thead = tabla.insertRow();

    var th = document.createElement("th");
    th.className = "text-center success";
    var texto_thead = document.createTextNode("Actividad");
    th.appendChild(texto_thead);
    tr_thead.appendChild(th);
    
    var th = document.createElement("th");
    th.className = "text-center success";
    var texto_thead = document.createTextNode("Duración (horas, semanas, meses)");
    th.appendChild(texto_thead);
    tr_thead.appendChild(th);

    var th = document.createElement("th");
    th.className = "text-center success";
    var texto_thead = document.createTextNode("Periocidad (1 vez a la semana, 1 vez al mes, etc)");
    th.appendChild(texto_thead);
    tr_thead.appendChild(th);

    var th = document.createElement("th");
    th.className = "text-center success";
    var texto_thead = document.createTextNode("Encargado de la actividad");
    th.appendChild(texto_thead);
    tr_thead.appendChild(th);

    thead.appendChild(tr_thead);
    tabla.appendChild(thead);
    //  ------------------ Fin contenido del head ------------------
    

    // ------------------ contenido del tbody ------------------
    // obtengo el numero de tr de la tabla cronograma
    var activities_num = (document.getElementById("cronograme").rows.length) - 1;
    for (var i=0; i < activities_num; i++){
        var tr_body = document.createElement("tr");
        var matches = document.querySelectorAll('input.cron');
        //si el input no esta vacio
        if(matches[i].value !== ""){
            for (var j=0; j < 4; j++){
                if(j==0){
                    td_body = document.createElement("td");
                    input_body = document.createElement("input");
                    //obtengo los input de la tabla cronograme y le entrego el value a estos input
                    input_body.value =matches[i].value;
                    
                    input_body.className = "form-control";
                    input_body.disabled = true;
                    td_body.appendChild(input_body);
                    tr_body.appendChild(td_body);
    
                }else{
                    td_body = document.createElement("td");
                    input_body = document.createElement("input");
                    input_body.name = "detalles_actividades[]";
                    input_body.required = true;
                    // input_body.id = "nombre_actividades";
                    input_body.className = "form-control";
                    td_body.appendChild(input_body);
                    tr_body.appendChild(td_body);
                }
            }
            tbody.appendChild(tr_body);
        };       
    }

    
    tabla.appendChild(tbody);

    //inserto el thead a la tabla
    activities_detail.appendChild(tabla);
    document.getElementById("table_activities_generate").value = "Refrescar tabla";

}