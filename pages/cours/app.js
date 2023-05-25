const menuIcon = document.querySelector('.menu-icon');
const dropdownMenu = document.querySelector('.dropdown-menu');

menuIcon.addEventListener('click', function(e) {
  e.stopPropagation();
  dropdownMenu.classList.toggle('active');
});

document.addEventListener('click', function(e) {
  if (!dropdownMenu.contains(e.target) && !menuIcon.contains(e.target)) {
    dropdownMenu.classList.remove('active');
  }
});

// Ajoutez cette partie pour cacher le menu déroulant au chargement de la page
window.addEventListener('DOMContentLoaded', function() {
  dropdownMenu.classList.add('hidden');
});
