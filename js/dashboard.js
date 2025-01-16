document.querySelector('.menu-toggle').addEventListener('click', function () {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('hidden');
});

 // Cerrar el menú si se hace clic fuera del sidebar en pantallas pequeñas
 document.addEventListener("DOMContentLoaded", () => {
const menuToggle = document.querySelector(".menu-toggle");
const sidebar = document.querySelector(".sidebar");

// Alternar la visibilidad del sidebar al hacer clic en el botón
menuToggle.addEventListener("click", () => {
sidebar.classList.toggle("visible");
});

// Cerrar el menú si se hace clic fuera del sidebar en pantallas pequeñas
document.addEventListener("click", (event) => {
if (window.innerWidth <= 768) { 
    if (!sidebar.contains(event.target) && !menuToggle.contains(event.target)) {
        sidebar.classList.remove("visible");
    }
}
});
});