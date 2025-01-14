<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admisiones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body class="bg-light">

<div class="container py-5">
    <!-- Encabezado FILTROS -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card p-3 shadow">
                <!-- FILTRAR POR CLIENTES-->
                <h4 class="mb-3">Clientes</h4>
                <div class="mb-2">
                    <label><input type="radio" name="filter" value="all" checked> Todos</label>
                    <label class="ms-3"><input type="radio" name="filter" value="ruc" onclick="enableCodeField()"> Por R.U.C</label>
                    <label class="ms-3"><input type="radio" name="filter" value="razon_social" onclick="enableRazonSocialField()"> Por Razón Social</label>
                </div>
                <div class="input-group">
                    <input type="text" id="searchCode" class="form-control" placeholder="RUC" disabled>
                    <input type="text" id="searchRazonSocial" class="form-control ms-2" placeholder="Razón Social" disabled>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3 shadow">
            <!-- FILTRAR POR ESTADOS DE ORDENES-->
            <h4 class="mb-3">Estado de Órdenes</h4>
                <div class="mb-2">
                    <label><input type="radio" name="orderStatus" value="pending"> Pendiente</label>
                    <label class="ms-3"><input type="radio" name="orderStatus" value="completed"> Terminado</label>
                    <label class="ms-3"><input type="radio" name="orderStatus" value="all" checked> Todos</label>
                </div>

                
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card p-3 shadow">
                <!-- FILTRAR POR BUSQUEDA GENERAL-->
            <h4 class="mb-3">Búsqueda</h4>
                <div class="mb-2">
                    <label><input type="radio" name="searchFilter" value="all" checked onclick="disableSearchField()"> Todos</label>
                    <label class="ms-3"><input type="radio" name="searchFilter" value="number" onclick="enableSearchField('number')"> Por Número</label>
                    <label class="ms-3"><input type="radio" name="searchFilter" value="name" onclick="enableSearchField('name')"> Por Nombre</label>
                </div>
                <div class="input-group">
                    <input type="text" id="searchNumber" class="form-control" placeholder="Número" disabled>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card p-3 shadow">
                <!-- FILTRAR POR RANGO DE FECHAS-->
                <h4 class="mb-3">Rango de Fechas</h4>
                <div class="mb-2">
                    <label><input type="radio" name="dateRange" value="all" checked onclick="disableDateFields()"> Todos</label>
                    <label class="ms-3"><input type="radio" name="dateRange" value="range" onclick="enableDateFields()"> Un rango</label>
                </div>
                <div class="input-group mb-3">
                    <input type="date" id="startDate" class="form-control" placeholder="Fecha de inicio" disabled>
                    <input type="date" id="endDate" class="form-control ms-2" placeholder="Fecha de fin" disabled>
                </div>
            </div>
        </div>
    </div>

    <!-- BTN BUSCAR-->
    <div class="row mb-4">
        <div class="col text-end">
            <button class="btn btn-sm btn-primary" onclick="applyFilters()">Buscar</button>
        </div>
    </div>

    <!-- Grilla -->
    <div class="card p-3 shadow mb-4">
        <h4 class="mb-3">Datos de la Tabla sotapedi</h4>
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr id="tableHeader">
                        <th>Número</th>
                        <th>Fecha</th>
                        <th>T. Doc</th>
                        <th>Nro. Doc</th>
                        <th>Paciente</th>
                        <th>Cliente</th>
                        <th>Moneda</th>
                        <th>Importe</th>
                        <th>Estado</th>
                        <th>Fecha Cita</th>
                        <th>Hora Cita</th>
                        <th>Médico</th>
                        <th>Especialidad</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Filas dinámicas -->
                </tbody>
            </table>
        </div>
        <p id="noDataMessage" class="text-center text-danger" style="display: none;">No se encontraron datos.</p>
    </div>

    <!-- Contenedor de paginación -->
    <div id="paginationContainer" class="pagination-container d-flex justify-content-center"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/Java_Admi.js"></script>

</body>
</html>
