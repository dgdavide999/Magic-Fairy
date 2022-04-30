/*Apertura della finestra modale delle donazioni*/
const modalBtn = document.getElementById("btnmodale");
modalBtn.addEventListener("click", openModal);
function openModal() {
    if (!modal.classList.contains("active")) {
        modal.classList.add("active");
    }
   
}

/*Chiusura della finestra modale delle donazioni*/
const closeBtn = document.getElementById("close-modal");
closeBtn.addEventListener("click", closeModal);
function closeModal() {
    if (modal.classList.contains("active")) {
        modal.classList.remove("active");
    }
  
}

/*Viene recuperato il valore della donazione per poterlo aggiornare*/

let pledge = document.getElementsByClassName("continue");

for (let i = 0; i < pledge.length; i++) {
    document.getElementsByClassName("continue")[i].addEventListener("click", function () {
    
    let amount = parseInt(document.getElementsByClassName("input-bid")[i].value); //Si recupera l'importo della donazione. La parseInt()funzione analizza un argomento stringa e restituisce un numero intero 
    //viene preso il valore minimo che può avere la donazione
    let nodeEl = document.getElementsByClassName("input-bid")[i];
    let minAmount = parseInt(nodeEl.getAttributeNode("min").value);
    let cvv= document.getElementById('cvv').value;
    let card= document.getElementById('cardNumber').value;
    let scad= document.getElementById('scad').value;
    let email=document.getElementById('email').value;
    var reg = new RegExp('^[0-9]*');
    var date = new Date(scad);
    date.setHours(0,0,0,0);
    var currentdate = new Date();
    currentdate.setHours(0,0,0,0);
    var espressione = /^[_a-z0-9+-]+(\.[_a-z0-9+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+$/;
    if (Number.isNaN(amount) || email=="" || scad=="" || card=="" || cvv=="" ) {//definisce se il valore passato è un numero 
        openNotificationModal("Perfavore inserisci tutti i valori richiesti");
        closeNotificationModal();
    }
    else if (!espressione.test(email)){
        openNotificationModal("Email errata");
        closeNotificationModal();
    }
    else if (date<currentdate){
        openNotificationModal("Carta scaduta");
        closeNotificationModal();
    }
    else if (card.length<15 || card.length>16 || !(reg.test(card))){
        openNotificationModal("Il numero della carta non è corretto");
        closeNotificationModal();
    }
    else if (cvv.length<3 || cvv.length>4 || !(reg.test(cvv))){
        openNotificationModal("Il cvv non è corretto");
        closeNotificationModal();
    }
    // Se il valore passato è maggiore o uguale al minimo fa l'incremento, altrimenti manda notifica di errore
    else if (amount >= minAmount) {
        openSuccessModal();
    } else {
        openNotificationModal("Il valore della donazione è troppo piccolo");
        closeNotificationModal();
    }
    })
    
}

/*Riempimento prograssivo della barra delle donazioni*/
let root = document.documentElement;
let currentAmount0 = parseInt(document.getElementById("donato").innerHTML.replace(",", ""));
let widthCalc = (currentAmount0 / 100000) * 100
root.style.setProperty('--Width', widthCalc + "%");

/*Finestre modali*/
let successModal = document.getElementById("success-container");
let notificationModal = document.getElementById("notification-container");
let innerNotification = document.getElementById("notification-modal");
let exitSuccess = document.getElementById("final-success");

function openSuccessModal() {
    successModal.classList.add("active");
}

function closeSuccessModal() {
    if (successModal.classList.contains("active")) {
        successModal.classList.remove("active");
    }
}

function openNotificationModal(notification) {
    notificationModal.classList.add("active");
    innerNotification.innerText = notification;
}

function closeNotificationModal() {
    setTimeout(function() {
        if (notificationModal.classList.contains("active")) {
            notificationModal.classList.remove("active");
        }
    }, 2000);
}

exitSuccess.addEventListener("click", function () {
    closeSuccessModal();
    closeModal();
    location.reload();
})


var success = document.getElementById("success-container");
var submit = document.getElementsByClassName("pay");

submit.onclick = function () {
    success.style.display = "grid";
}

var closeSuccess = document.getElementById("final-success");

closeSuccess.onclick = function () {
    success.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == closeSuccess) {
        success.style.display = "none";
    }
}
