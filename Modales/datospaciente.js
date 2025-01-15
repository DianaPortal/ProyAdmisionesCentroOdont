document.addEventListener("DOMContentLoaded", () => {
    // Variables para manejar los modales
    const modalArticulosPedido = document.getElementById("modalArticulosPedido");
    const modalDatosPaciente = document.getElementById("modalDatosPaciente");
    const modalBusquedaCitas = document.getElementById("modalBusquedaCitas");
    const modalBusquedaArticulos = document.getElementById("modalBusquedaArticulos"); // ID del modal de búsqueda de artículos

    const btnAgregarArticulo = document.getElementById("btnAgregarArticulo");
    const btnDatosPaciente = document.getElementById("datosPacienteBtn");
    const btnBuscarCita = document.getElementById("buscarCitaBtn");
    const btnCodRegArtPed = document.getElementById("btnCodRegArtPed"); // Botón de búsqueda de artículos

    const closeModalBtns = document.querySelectorAll(".close-modal");

    // Función para abrir un modal específico
    function abrirModal(modal) {
        if (modal) {
            console.log("Abriendo modal:", modal.id);
            modal.style.display = "flex"; // Cambia el estilo para hacerlo visible
        } else {
            console.error("Modal no encontrado.");
        }
    }

    // Función para cerrar un modal específico
    function cerrarModal(modal) {
        if (modal) {
            console.log("Cerrando modal:", modal.id);
            modal.style.display = "none"; // Cambia el estilo para ocultarlo
        } else {
            console.error("Modal no encontrado.");
        }
    }

    // Evento para abrir el modal "Artículos de Pedido"
    if (btnAgregarArticulo && modalArticulosPedido) {
        btnAgregarArticulo.addEventListener("click", () => {
            abrirModal(modalArticulosPedido);
        });
    }

    // Evento para abrir el modal "Datos del Paciente"
    if (btnDatosPaciente && modalDatosPaciente) {
        btnDatosPaciente.addEventListener("click", () => {
            abrirModal(modalDatosPaciente);
        });
    }

    // Evento para abrir el modal "Búsqueda de Citas"
    if (btnBuscarCita && modalBusquedaCitas) {
        btnBuscarCita.addEventListener("click", () => {
            abrirModal(modalBusquedaCitas);
        });
    }

    // Evento para abrir el modal "Búsqueda de Artículos"
    if (btnCodRegArtPed && modalBusquedaArticulos) {
        btnCodRegArtPed.addEventListener("click", () => {
            abrirModal(modalBusquedaArticulos);
        });
    }

    // Cerrar el modal al hacer clic en el botón de cierre
    closeModalBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            const modal = btn.closest(".modal");
            cerrarModal(modal);
        });
    });

    // Cerrar el modal al hacer clic fuera del contenido del modal
    window.addEventListener("click", (event) => {
        if (modalArticulosPedido && event.target === modalArticulosPedido) {
            cerrarModal(modalArticulosPedido);
        }
        if (modalDatosPaciente && event.target === modalDatosPaciente) {
            cerrarModal(modalDatosPaciente);
        }
        if (modalBusquedaCitas && event.target === modalBusquedaCitas) {
            cerrarModal(modalBusquedaCitas);
        }
        if (modalBusquedaArticulos && event.target === modalBusquedaArticulos) {
            cerrarModal(modalBusquedaArticulos);
        }
    });
});
