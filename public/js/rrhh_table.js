document.getElementById("generate_rrhh").addEventListener("click", generate_table_rrhh);
document.getElementById("new_profile").addEventListener("click", new_profile);

//funcion base que arma el thead
function generate_table_rrhh(e){

    e.target.removeEventListener(e.type, generate_table_rrhh);
    document.getElementById("generate_rrhh").style.display ="none";
    // Obtener la referencia del elemento donde mostrare la tabla
    var div_rrhh_table = document.getElementById("div_rrhh_table");
    // Crea un elemento <table>,<thead> y un elemento <tbody>
    var tabla   = document.createElement("table");
    tabla.id = "rrhh_table";
    tabla.className="table table-bordered";    
    var thead = document.createElement("thead");
    var tbody = document.createElement("tbody");

    //contenido del head
    tr_thead = tabla.insertRow();

    var th = document.createElement("th");
    th.className = "text-center";
    var texto_thead = document.createTextNode("Perfil Profesional");
    th.appendChild(texto_thead);
    tr_thead.appendChild(th);
    
    var th = document.createElement("th");
    th.className = "text-center";
    var texto_thead = document.createTextNode("Funciones a realizar (función,horas a la semana, horas totales, etc)");
    th.appendChild(texto_thead);
    tr_thead.appendChild(th);

    var th = document.createElement("th");
    th.className = "text-center";
    var texto_thead = document.createTextNode("Actividad del proyecto en que participara");
    th.appendChild(texto_thead);
    tr_thead.appendChild(th);

    var th = document.createElement("th");
    th.className = "text-center";
    var texto_thead = document.createTextNode("Monto a cancelar $");
    th.appendChild(texto_thead);
    tr_thead.appendChild(th);

    //añado los td y tr a la tabla
    thead.appendChild(tr_thead);
    tabla.appendChild(thead);
    // Fin contenido del head
    

    //creo el contenido (tbody) y lo adjunto
    var tr_profile = content();
    tbody.appendChild(tr_profile);
    tabla.appendChild(tbody);

    //inserto la tabla al div
    div_rrhh_table.appendChild(tabla);

    //hago visible el boton de añadir otro perfil
    document.getElementById("new_profile").style.display="inline";

}

function content(){
    var tr_profile = document.createElement("tr");
    
    for (var i=0; i<4; i++)
    {
        var input_profile = document.createElement("input");
        //si es el ultimo td que sea tipo number sino text
        if(i!==3)
        {
            input_profile.type = "text";
        }else{
            input_profile.type = "number";
        }
        
        input_profile.className = "form-control";
        input_profile.required = true;
        input_profile.name = "perfil_profesional";

        var td_profile= document.createElement("td");
        td_profile.appendChild(input_profile);
        tr_profile.appendChild(td_profile);

        //si el bucle llega a su ultima iteracion creo un boton para eliminar perfil
        if(i == 3){
            var td_accion = document.createElement("td");
            td_accion.className = "btn-group";
            var btn_accion = document.createElement("span");
            btn_accion.id = "delete_row_profile";
            btn_accion.className = "glyphicon glyphicon-remove btn btn-danger";
            //funcion para borrar perfil
            btn_accion.onclick= function deleteRow() {
                var row = this.parentNode.parentNode;
                var idx = row.rowIndex;
                var table = row.parentNode.parentNode;
                table.deleteRow(idx);
            };
            td_accion.appendChild(btn_accion);
            tr_profile.appendChild(td_accion);

        }
    }

    return tr_profile;

}

function new_profile(){
    var tbodyRef = document.getElementById('rrhh_table').getElementsByTagName('tbody')[0];
    var new_tr = content();
    tbodyRef.appendChild(new_tr);
}