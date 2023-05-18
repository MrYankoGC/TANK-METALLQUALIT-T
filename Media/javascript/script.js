const tank1 = document.getElementById('tank1');
const tank2 = document.getElementById('tank2');
const tank3 = document.getElementById('tank3');
const overlay = document.getElementById('overlay');
const tankOverlay = document.getElementById('tank-overlay');
const tankImg = document.getElementById('tank-img');
const tankName = document.getElementById('tank-name');
const tankPrice = document.getElementById('tank-price');
const tankDesc = document.getElementById('tank-desc');
const closeBtn = document.getElementById('close-btn');

// Función para mostrar el overlay con la información del tanque
function showOverlay(tank) {
  // Asignar los valores correspondientes al overlay
  tankImg.src = tank.querySelector('img').src;
  tankName.textContent = tank.querySelector('h3').textContent;
  tankPrice.textContent = tank.querySelector('p').textContent;
  tankDesc.textContent = 'Descripción del tanque';

  // Mostrar el overlay
  overlay.style.display = 'block';
}

// Función para cerrar el overlay
function closeOverlay() {
  // Ocultar el overlay
  overlay.style.display = 'none';
}

// Evento click para cada tanque
tank1.addEventListener('click', function() {
  showOverlay(this);
});

tank2.addEventListener('click', function() {
  showOverlay(this);
});

tank3.addEventListener('click', function() {
  showOverlay(this);
});

// Evento click para el botón de cerrar
closeBtn.addEventListener('click', function() {
  closeOverlay();
});
