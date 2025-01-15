
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal de Datos del Paciente</title>
    <link rel="stylesheet" href="../Modales/modales.css">
</head>
<body>
 

<!-- Modal "modalDatosPaciente" -->
<div id="modalDatosPaciente" class="modal">
    <div class="modal-content modal-large">
        <div class="modal-header">
            <h2>Datos del Paciente</h2>
            <button class="close-modal">&times;</button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="codigoPaciente">Código Paciente:</label>
                    <input type="text" id="codigoPaciente" name="codigoPaciente">
                    <button id="buscarCitaBtn" type="button" class="small-btn" >Buscar Cita</button>
                </div>
                <div class="form-group">
                    <label for="apellidosNombres">Apellidos y Nombres:</label>
                    <input type="text" id="apellidosNombres" name="apellidosNombres">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion">
                </div>
                <div class="form-group">
                    <label for="docIdentidad">Documento Identidad:</label>
                    <input type="text" id="docIdentidad" name="docIdentidad">
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono">
                </div>
                <div class="form-group">
                    <label for="tipoPaciente">Tipo de Paciente:</label>
                    <input type="text" id="tipoPaciente" name="tipoPaciente">
                </div>
                <div class="form-group">
                    <label for="codigoMedico">Código Médico:</label>
                    <input type="text" id="codigoMedico" name="codigoMedico" placeholder="Codigo">
                    <input type="text" id="nombreMedico" name="nombreMedico" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="especialidad">Especialidad:</label>
                    <input type="text" id="especialidad" name="especialidad">
                </div>
                <div class="form-group">
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha">
                </div>
                <div class="form-group">
                    <label for="hora">Hora:</label>
                    <input type="time" id="hora" name="hora">
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="btn-accept">Aceptar</button>
            <button class="btn-cancel close-modal">Cancelar</button>
        </div>
    </div>
</div>

<?php include '../Modales/modalBusquedaCitas.html';?>
<script src="../Modales/datospaciente.js"></script>
    
</body>
</html>
