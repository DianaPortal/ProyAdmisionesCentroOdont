document.addEventListener("DOMContentLoaded", () => {
    // Seleccionar el botón que abre el modal
    const openModalButton = document.getElementById("datosPacienteBtn");
    // Seleccionar el modal
    const modal = document.getElementById("modalDatosPaciente");
    // Validar si los elementos existen
    if (!openModalButton || !modal) {
        console.error("Botón o modal no encontrados");
        return;
    }
    // Seleccionar el botón que cierra el modal
    const closeModalButton = modal.querySelector(".close-modal");

    if (!closeModalButton) {
        console.error("Botón de cerrar no encontrado en el modal");
        return;
    }

    // Abrir el modal al hacer clic en el botón
    openModalButton.addEventListener("click", () => {
        modal.classList.add("active");
    });

    // Cerrar el modal al hacer clic en el botón de cerrar
    closeModalButton.addEventListener("click", () => {
        modal.classList.remove("active");
    });

    // Cerrar el modal al hacer clic fuera del contenido del modal
    window.addEventListener("click", (event) => {
        if (event.target === modal) {
            modal.classList.remove("active");
        }
    });
});
