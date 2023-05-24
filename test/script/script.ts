const foot = document.getElementById('foot') as HTMLDivElement | null;
const button = document.getElementById('close-button') as HTMLDivElement | null;

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
