const foot = document.getElementById('foot') as HTMLDivElement | null;
const button = document.getElementById('close-button') as HTMLDivElement | null;

// Footer hide
function hide(): void {
  if (foot && foot.style.display === 'none') {
    foot.style.display = 'block';
    foot.style.opacity = '1';
    if (button) {
      button.textContent = 'X';
    }
  } else if (foot) {
    foot.style.display = 'none';
    foot.style.opacity = '0';
    if (button) {
    button.textContent = '+';
    }
  }
}

// Variables
const buttonConnect = document.getElementById('butConnect');
const divCon = document.getElementById('popConnect');
const closeButtonCon = document.getElementById('closePopCon');
const buttonInscript = document.getElementById('butInscript');
const divIns = document.getElementById('popInscript');
const closeButtonIns = document.getElementById('closePopIns');

// Connexion PopUp show
if (buttonConnect && divCon) {
  buttonConnect.addEventListener('click', () => {
    divCon.style.display = 'block';
  });
}

// Connexion PopUp close
if (closeButtonCon && divCon) {
  closeButtonCon.addEventListener('click', () => {
    divCon.style.display = 'none';
  });
}

// Inscription PopUp show
if (buttonInscript && divIns) {
  buttonInscript.addEventListener('click', () => {
    divIns.style.display = 'block';
  });
}

// Inscription Popup close
if (closeButtonIns && divIns) {
  closeButtonIns.addEventListener('click', () => {
    divIns.style.display = 'none';
  });
}
