// Función para obtener la fecha actual en formato DD/MM/YYYY
function getDefaultDate() {
    const today = new Date();
    const day = String(today.getDate()).padStart(2, '0');
    const month = String(today.getMonth() + 1).padStart(2, '0'); // Enero es 0
    const year = today.getFullYear();
    return `${year}-${month}-${day}`; // Formato para el input de tipo date
}

// Función para mostrar la fecha en formato DD/MM/YYYY
function formatDateToDisplay(date) {
    const [year, month, day] = date.split('-');
    return `${day}/${month}/${year}`; // Convertir a DD/MM/YYYY
}

// Configurar fecha por defecto al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    const fechaInput = document.getElementById("fechacita");
    if (fechaInput) {
        // Establecer la fecha en el input
        const defaultDate = getDefaultDate();
        fechaInput.textContent = formatDateToDisplay(defaultDate);
    }
});