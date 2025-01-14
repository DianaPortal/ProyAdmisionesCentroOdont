
function updateDateTime() {
    const now = new Date();

    // Formatear la fecha en formato YYYY-MM-DD
    const formattedDate = now.toISOString().split('T')[0];
    document.getElementById('fecha').value = formattedDate;

    // Formatear la hora en formato HH:MM:SS
    const formattedTime = now.toTimeString().split(' ')[0];
    document.getElementById('hora').value = formattedTime;
}

// Actualizar la fecha y la hora cada segundo
setInterval(updateDateTime, 1000);

// Llamar a la función para establecer los valores iniciales
updateDateTime();
