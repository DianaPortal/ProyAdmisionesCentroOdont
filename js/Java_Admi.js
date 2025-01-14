// Función para habilitar el campo Código
function enableCodeField() {
    document.getElementById("searchCode").disabled = false;
    document.getElementById("searchRazonSocial").disabled = true;
    document.getElementById("searchNumber").disabled = true;
}

// Función para habilitar el campo Razón Social
function enableRazonSocialField() {
    document.getElementById("searchRazonSocial").disabled = false;
    document.getElementById("searchCode").disabled = true;
    document.getElementById("searchNumber").disabled = true;
}

// Función para habilitar la casilla de búsqueda de Número o Nombre
function enableSearchField(type) {
    const searchField = document.getElementById("searchNumber");
    searchField.disabled = false;

    if (type === 'number') {
        searchField.placeholder = 'Número';
    } else if (type === 'name') {
        searchField.placeholder = 'Nombre';
    }
}

// Función para deshabilitar el campo Número y su valor
function disableSearchField() {
    const searchField = document.getElementById("searchNumber");
    searchField.disabled = true;
    searchField.value = '';
}

// Función para habilitar los campos de fecha
function enableDateFields() {
    document.getElementById("startDate").disabled = false;
    document.getElementById("endDate").disabled = false;
    document.getElementById("startDate").focus();
}

// Función para deshabilitar los campos de fecha
function disableDateFields() {
    document.getElementById("startDate").disabled = true;
    document.getElementById("endDate").disabled = true;
    document.getElementById("startDate").value = '';
    document.getElementById("endDate").value = '';
}

// Función para aplicar los filtros y enviar los datos al backend
function applyFilters() {
    const filters = {
        p_codcli: document.querySelector('input[name="filter"]:checked')?.value === "ruc"
            ? document.getElementById("searchCode")?.value.trim() || null
            : null,
        p_nomcli: document.querySelector('input[name="filter"]:checked')?.value === "razon_social"
            ? document.getElementById("searchRazonSocial")?.value.trim() || null
            : null,

            p_nrooc: document.querySelector('input[name="searchFilter"]:checked')?.value === "number" ||
            document.querySelector('input[name="searchFilter"]:checked')?.value === "name"
      ? document.getElementById("searchNumber")?.value.trim() || null
      : null,
  

        p_tipest: document.querySelector('input[name="orderStatus"]:checked')?.value === "all"
            ? null
            : document.querySelector('input[name="orderStatus"]:checked')?.value === "pending"
            ? 'P'
            : 'T',

        p_fchini: document.querySelector('input[name="dateRange"]:checked')?.value === "range"
            ? document.getElementById("startDate")?.value || null
            : null,
            
        p_fchfin: document.querySelector('input[name="dateRange"]:checked')?.value === "range"
            ? document.getElementById("endDate")?.value || null
            : null,
    };

    console.log("Filtros enviados:", filters);

    fetch('../Controller/Admisiones.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(filters),
    })
        .then((response) => response.json())
        .then((data) => {
            updateTable(data.data);
            updatePagination(data.pagination);
        })
        .catch((error) => {
            console.error("Error al aplicar los filtros:", error);
        });
}

// Función para actualizar la tabla con los datos obtenidos
function updateTable(data) {
    const tableBody = document.getElementById("tableBody");
    const noDataMessage = document.getElementById("noDataMessage");

    // Limpiar la tabla
    tableBody.innerHTML = "";

    if (data.length > 0) {
        noDataMessage.style.display = "none";
        data.forEach(row => {
            const tr = document.createElement("tr");
            Object.values(row).forEach(value => {
                const td = document.createElement("td");
                td.textContent = value;
                tr.appendChild(td);
            });
            tableBody.appendChild(tr);
        });
    } else {
        noDataMessage.style.display = "block";
    }
}

// Función para actualizar la paginación
function updatePagination(pagination) {
    const paginationContainer = document.getElementById("paginationContainer");

    // Limpiar la paginación
    paginationContainer.innerHTML = "";

    const currentPage = pagination.current_page;
    const perPage = pagination.per_page;

    // Botón de página anterior
    if (currentPage > 1) {
        const prevButton = document.createElement("button");
        prevButton.textContent = "Anterior";
        prevButton.addEventListener("click", () => applyFilters(currentPage - 1));
        paginationContainer.appendChild(prevButton);
    }

    // Botón de página actual
    const currentButton = document.createElement("span");
    currentButton.textContent = `Página ${currentPage}`;
    paginationContainer.appendChild(currentButton);

    // Botón de página siguiente
    const nextButton = document.createElement("button");
    nextButton.textContent = "Siguiente";
    nextButton.addEventListener("click", () => applyFilters(currentPage + 1));
    paginationContainer.appendChild(nextButton);
}