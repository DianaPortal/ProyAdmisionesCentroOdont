// Función para obtener la fecha actual en formato DD/MM/YYYY


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

// Función para buscar citas (simulación con fetch)
function buscarCitas() {
    const filtros = {
        p_codcmp: document.querySelector('input[name="busquedaMedicos"]:checked').value === "unMedico"
            ? document.getElementById("codigoMedico").value.trim() || null
            : null,
        p_especialidad: document.querySelector('input[name="busquedaMedicos"]:checked').value === "unMedico"
            ? document.getElementById("especialidad").value.trim() || null
            : null,
        p_sigper: document.querySelector('input[name="busquedaPacientes"]:checked').value === "apellidosNombres"
            ? document.getElementById("apellidosNombres").value.trim() || null
            : null,
    };

    console.log("Filtros enviados:", filtros);

    fetch('../Controller/BuscarCita.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(filtros),
    })
        .then((response) => response.json())
        .then((data) => {
            updateTable(data);
        })
        .catch((error) => {
            console.error("Error al buscar citas:", error);
        });
}

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
function selectRow() {
    alert("Seleccionar funcionalidad pendiente.");
}
