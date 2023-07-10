var foot = document.getElementById('foot');
var button = document.getElementById('close-button');
// Footer hide
function hide() {
    if (foot && foot.style.display === 'none') {
        foot.style.display = 'block';
        foot.style.opacity = '1';
        if (button) {
            button.textContent = 'X';
        }
    }
    else if (foot) {
        foot.style.display = 'none';
        foot.style.opacity = '0';
        if (button) {
            button.textContent = '+';
        }
    }
}
var buttonConnect = document.getElementById('butConnect');
var divCon = document.getElementById('popConnect');
var closeButtonCon = document.getElementById('closePopCon');
var buttonInscript = document.getElementById('butInscript');
var divIns = document.getElementById('popInscript');
var closeButtonIns = document.getElementById('closePopIns');
// Connexion PopUp show
if (buttonConnect && divCon) {
    buttonConnect.addEventListener('click', function () {
        divCon.style.display = 'block';
    });
}
// Connexion PopUp close
if (closeButtonCon && divCon) {
    closeButtonCon.addEventListener('click', function () {
        divCon.style.display = 'none';
    });
}
// Inscription PopUp show
if (buttonInscript && divIns) {
    buttonInscript.addEventListener('click', function () {
        divIns.style.display = 'block';
    });
}
// Inscription Popup close
if (closeButtonIns && divIns) {
    closeButtonIns.addEventListener('click', function () {
        divIns.style.display = 'none';
    });
}
