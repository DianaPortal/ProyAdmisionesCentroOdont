

// Función para deshabilitar campos de médico
function disableMedicoFields() {
    const codigoMedico = document.getElementById("codigoMedico");
    const especialidad = document.getElementById("especialidad");
    codigoMedico.disabled = true;
    especialidad.disabled = true;
    codigoMedico.value = ""; // Limpiar valores
    especialidad.value = "";
}

// Función para habilitar campos de médico
function enableMedicoFields() {
    console.log("Habilitando campos de médico"); // Confirmar ejecución
    document.getElementById("codigoMedico").disabled = false;
    document.getElementById("especialidad").disabled = false;
}
// Función para deshabilitar campos de paciente
function disablePacienteFields() {
    const apellidosNombres = document.getElementById("apellidosNombres");
    apellidosNombres.disabled = true;
    apellidosNombres.value = ""; // Limpiar valor
}

// Función para habilitar campos de paciente
function enablePacienteFields() {
    document.getElementById("apellidosNombres").disabled = false;
}

// Función para buscar citas 
/***************************************** */


function buscarCitas() {
    const busquedaMedicos = document.querySelector('input[name="busquedaMedicos"]:checked').value;
    const busquedaPacientes = document.querySelector('input[name="busquedaPacientes"]:checked').value;

    const filtros = {
        p_codcmp: (busquedaMedicos === "unMedico" && document.getElementById("codigoMedico").value.trim() !== "")
            ? document.getElementById("codigoMedico").value.trim()
            : null,
        p_especialidad: (busquedaMedicos === "unMedico" && document.getElementById("especialidad").value.trim() !== "")
            ? document.getElementById("especialidad").value.trim()
            : null,
        p_sigper: (busquedaPacientes === "apellidosNombres" && document.getElementById("apellidosNombres").value.trim() !== "")
            ? document.getElementById("apellidosNombres").value.trim()
            : null,
    };

    // Si la opción "Todos" está seleccionada, enviamos filtros vacíos para traer toda la data
    if (busquedaMedicos === "todos") {
        filtros.p_codcmp = null;
        filtros.p_especialidad = null;
    }

    if (busquedaPacientes === "todos") {
        filtros.p_sigper = null;
    }

    console.log("Filtros enviados:", filtros);

    // Realizamos la búsqueda
    fetch('../Controller/BuscarCita.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(filtros),
    })
    .then((response) => response.json())
    .then((data) => {
        updateTable(data.data); // Ajustamos para acceder al array de datos
    })
    .catch((error) => {
        console.error("Error al buscar citas:", error);
    });
}

// Prevenir el envío del formulario
document.querySelector("form").addEventListener("submit", (event) => {
   // event.preventDefault(); // Detener el comportamiento predeterminado
});

// Asignar eventos a los radios de selección
document.querySelectorAll('input[name="busquedaMedicos"], input[name="busquedaPacientes"]').forEach((radio) => {
    radio.addEventListener("change", () => {
        const busquedaMedicos = document.querySelector('input[name="busquedaMedicos"]:checked').value;
        const busquedaPacientes = document.querySelector('input[name="busquedaPacientes"]:checked').value;

        if (busquedaMedicos === "todos" || busquedaPacientes === "todos") {
            buscarCitas(); // Ejecutar búsqueda para "Todos"
        } else {
            if (busquedaMedicos === "unMedico") {
                enableMedicoFields();
            } else {
                disableMedicoFields();
            }

            if (busquedaPacientes === "apellidosNombres") {
                enablePacienteFields();
            } else {
                disablePacienteFields();
            }
        }
    });
});

// Asignar eventos a los inputs de filtro
document.querySelectorAll("#codigoMedico, #especialidad, #apellidosNombres").forEach((input) => {
    input.addEventListener("keydown", (event) => {
        if (event.key === "Enter") {
            event.preventDefault(); // Evitar recarga de la página
            buscarCitas(); // Ejecutar la búsqueda
        }
    });
});
// Función para actualizar la tabla
function updateTable(data) {
    const tableBody = document.getElementById("tableBody");
    tableBody.innerHTML = ""; // Limpiar tabla

    if (data.length > 0) {
        data.forEach((row) => {
            const tr = document.createElement("tr");
            Object.values(row).forEach((value) => {
                const td = document.createElement("td");
                td.textContent = value;
                tr.appendChild(td);
            });
            tableBody.appendChild(tr);
        });
    } else {
        const tr = document.createElement("tr");
        const td = document.createElement("td");
        td.colSpan = 5;
        td.textContent = "No se encontraron resultados";
        tr.appendChild(td);
        tableBody.appendChild(tr);
    }
}


// Función para cerrar el modal
function closeModal() {
    document.getElementById("modalBusquedaCitas").style.display = "none";
}

// Función para seleccionar una fila (pendiente)
// Asignar evento de clic al botón "Seleccionar"
document.getElementById("btnSeleccionar").addEventListener("click", selectRow);

// Función para seleccionar una fila
function selectRow() {
    alert("Seleccionar funcionalidad pendiente.");
}
