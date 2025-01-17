function updateDateTime() {
    const now = new Date();

    // Formatear la fecha en formato YYYY-MM-DD
    const formattedDate = now.toISOString().split('T')[0];
    document.getElementById('fecha').value = formattedDate;

    // Formatear la hora en formato HH:MM:SS
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    const formattedTime = `${hours}:${minutes}:${seconds}`;
    document.getElementById('hora').value = formattedTime;
}

// Actualizar la fecha y la hora cada segundo
setInterval(updateDateTime, 1000);

// Llamar a la función para establecer los valores iniciales
updateDateTime();
