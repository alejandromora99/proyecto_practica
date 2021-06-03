var inputs = document.querySelectorAll("input[type='number']");

var invalidChars = [
    "-",
    "+",
    "e",
  ];
//añado eventos a los input number
for (var i = 0 ; i < inputs.length; i++) {
    inputs[i].addEventListener('keydown' , validate); 
    inputs[i].addEventListener('paste' , paste); 
 }



function validate(e){
    //si apreto un caracter invalido se cancela el evento
    if (invalidChars.includes(e.key)) {
        e.preventDefault();
    }
        
}

function paste(e){
    e.preventDefault();
}
