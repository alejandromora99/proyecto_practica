import Dropzone from "dropzone";
// Make sure Dropzone doesn't try to attach itself to the
// element automatically.
// This behaviour will change in future versions.
const inputToken = document.querySelector("input[name='_token']");

Dropzone.options.dropzoneForm = {
    parallelUploads: 8,
    //desactivo la subida automatica
    autoProcessQueue : false,
    dictDefaultMessage: "Arrastre los archivos al recuadro para subirlos",
    dictRemoveFile: 'Eliminar archivo',
    dictMaxFilesExceeded: 'Cantidad máxima de archivos para subir superada',
    dictFallbackMessage: 'Tu navegador no soporta esta función',
    dictFileTooBig: 'El archivo supera el maximo de 2 MB',
    dictInvalidFileType: 'Los archivos de este tipo no serán subidos',
    maxFiles : 8,
    maxFilesize: 2,
    previewTemplate: document.querySelector('#preview').innerHTML,
    acceptedFiles: "application/pdf,.docx,.doc,.xls,.xlsx, .zip",
    addRemoveLinks: true,
    

    init: function(){
        var submitButton = document.querySelector("#submit_all");
        var myDropzone = this;
        submitButton.addEventListener('click', function(){
            //al boton le añado la funcion para subir las imagenes en cola
            myDropzone.processQueue();
        });
        //cuando la subida fue completada
        this.on("complete", function(){
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0){
                var _this = this;
                _this.removeAllFiles();
                load_files();
            }
            
        });

        
    
        // cuando se añada otro archivo
        this.on('addedfile', function(file) {
            //recibo el archivo y su nombre, separando su tipo
            var ext = file.name.split('.').pop();
            if (ext == "pdf") {
                $(file.previewElement).find(".dz-image img").attr("src", "/css/images/logos/pdflogo.png");
                //si la extension es doc o docx
            } else if (ext.indexOf("doc") != -1) {
                $(file.previewElement).find(".dz-image img").attr("src", "/css/images/logos/wordlogo.png");
            } else if (ext.indexOf("xls") != -1) {
                $(file.previewElement).find(".dz-image img").attr("src", "/css/images/logos/microsoft-excel.png");
            } else if(ext.indexOf("zip") != -1){
                $(file.previewElement).find(".dz-image img").attr("src", "/css/images/logos/ziplogo.png");
            }

        });
    }
    
};




load_files();

function load_files(){
    $.ajax({
        url:window.location.href+"/dropzone/fetch",
        success:function(data){
            $("#uploaded_file").html(data);
        },
        // error: function(req, err){ console.log(err); }
    })
}

$(document).on("click", ".remove_button", function(){
    var id = $(this).attr("id");
    $.ajax({
        method: "POST",
        headers: {"X-CSRF-TOKEN": inputToken.value},
        url:window.location.href+"/dropzone/delete",
        data:{id : id},
        success : function(data){
            load_files();
        }
    })
});



// Dropzone.autoDiscover = false;

// let myDropzone = new Dropzone("#file_form");

// myDropzone.on("addedfile", file => {
//   console.log(`File added: ${file.name}`);
// });