function validaAux(id){
    let value = document.getElementById(id).value;
    let x = document.getElementById("err_" + id);
    if ((value == "") || (value == "undefined")) {
        x.innerText = "  non lasciare il campo vuoto  ";
        throw "campo vuoto";
    }
    return([value,x]);
}

function valida(id) {
    let value = validaAux(id);
    value[1].innerText = "";
    return true;
}

function validaPass(id) {
    let value = validaAux(id);
    if(value[0].length<6){
        value[1].innerText = "password troppo corta";
        return false;
    }
    value[1].innerText = "";
    return true
}

function validaMail(id) {
    let email_valid = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-]{2,})+.)+([a-zA-Z0-9]{2,})+$/;
    let value = validaAux(id);
    if (!email_valid.test(value[0])) {
        value[1].innerText = "Devi inserire un indirizzo mail corretto";
        return false;
    }
    x.innerText = "";
    return true;
}

function validaCarta(id){
    let reg = new RegExp('^[0-9]$');
    let value = validaAux(id);
    if(!reg.test(value[0]) || value[0].length <15 || value[0].length >16){
        //value[1].innerText = "numero carta di credito non valido";
        return false;
    }
}

function validaCvv(id){
    let value = validaAux(id);
    let reg = new RegExp('^[0-9]$');
    if (!reg.test(value[0]) || value[0].length <3 || value[0].length >4) {
        value[1].innerText = "cvv non valido";
        return false;
    }
    return true
}

function submitRegistration() {
    var myform = document.getElementById("form1");
    if (
        valida(myform.elements[0].id) &&
        valida(myform.elements[1].id) &&
        validaMail(myform.elements[2].id) &&
        valida(myform.elements[3].id) &&
        valida(myform.elements[4].id)
    ) { return true; }
    return false;
}

function submitLogin() {
    var myform = document.getElementById("form1");
    if (
        validaMail(myform.elements[0].id) &&
        valida(myform.elements[1].id)
    ) { return true; }
    return false;
}

function submitModificaAccount() {
    var myform = document.getElementById("modAccount");
    if (
        valida(myform.elements[0].id) &&
        valida(myform.elements[1].id) &&
        validaMail(myform.elements[2].id) &&
        valida(myform.elements[3].id) &&
        valida(myform.elements[4].id) &&
        valida(myform.elements[5].id)
    ) { return true; }
    return false;
}

function submitCrowd() {
    var myform = document.getElementById("form1");
    if (

        validaMail(myform.elements[0].id) &&
        validaCarta(myform.elements[1].id) &&
        valida(myform.elements[4].id) &&
        validaCvv(myform.elements[5].id)
    ) { return true; }
    return false;
}