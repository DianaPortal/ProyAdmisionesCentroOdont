<?php
// Incluir el archivo del controlador que genera el número de orden
include '../Controller/AdmisionesRegistro.php';
include('dashboard.php');

// Asegúrate de que $nroo_c tiene un valor
if (!isset($nroo_c) || empty($nroo_c)) {
    $nroo_c = 'A0000001'; // Valor predeterminado si no se genera correctamente
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="../css/registroAdmisiones.css">
</head>
<body>
    <form class="form-admisiones" action="../Controller/AdmisionesRegistro.php" method="POST">
      

        <!-- Grupo: Nro. de Orden, Estado, Fecha, Hora -->
        <div class="form-row">
            <div class="form-group-admisiones">
                <label for="nroOrden">Nro. de Orden:</label>
                <input type="text" id="nroOrden" name="nroo_c" value="<?php echo htmlspecialchars($nroo_c); ?>" readonly>
            </div>
            <div class="form-group-admisiones">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" value="PENDIENTE" readonly>
            </div>
            <div class="form-group-admisiones">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha">
            </div>
            <div class="form-group-admisiones">
                <label for="hora">Hora:</label>
                <input type="time" id="hora" name="hora">
            </div>
        </div>

        <button id="datosPacienteBtn" type="button" class="btn-admisiones">Datos del Paciente / Cita</button>

        <!-- Grupo: Datos del Cliente -->
        <div class="section-admisiones">
            <div class="section-title-admisiones">Datos del Cliente</div>
            <div class="form-row">
                <div class="form-group-admisiones">
                    <label for="cliente">Cliente:</label>
                    <button class="small-btn-admisiones" type="button"></button>
                    <input type="text" id="codigoCliente" name="codigoCliente" placeholder="Código">
                    <input type="text" id="nombreCliente" name="nombreCliente" placeholder="Nombre">
                </div>
                <div class="form-group-admisiones">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion">
                </div>
                <div class="form-group-admisiones">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono">
                </div>
                <div class="form-group-admisiones">
                    <label for="paciente">Paciente:</label>
                    <input type="text" id="paciente" name="paciente">
                </div>
                <div class="form-group-admisiones">
                    <label for="docIdentidad">Doc. Identidad:</label>
                    <input type="text" id="docIdentidad" name="docIdentidad">
                </div>
            </div>
        </div>

        <!-- Grupo: Datos del Pago -->
        <div class="section-admisiones">
            <div class="section-title-admisiones">Datos del Pago</div>
            <div class="form-row">
                <div class="form-group-admisiones">
                    <label for="tipoPaciente">Tipo de Paciente:</label>
                    <input type="text" id="tipoPaciente" name="tipoPaciente">
                </div>
                <div class="form-group-admisiones">
                    <label for="moneda">Moneda:</label>
                    <button class="small-btn-admisiones" type="button"></button>
                    <input type="text" id="codigoMoneda" name="codigoMoneda" placeholder="Código">
                    <input type="text" id="nombreMoneda" name="nombreMoneda" placeholder="Nombre">
                </div>
                <div class="form-group-admisiones">
                    <label for="formaPago">Forma de Pago:</label>
                    <button class="small-btn-admisiones" type="button"></button>
                    <input type="text" id="codigoFormaPago" name="codigoFormaPago" placeholder="Código">
                    <input type="text" id="nombreFormaPago" name="nombreFormaPago" placeholder="Nombre">
                </div>
                <div class="form-group-admisiones">
                    <label for="comprobantePago">Comprob. Pago:</label>
                    <input type="text" id="codigoComprobante" name="codigoComprobante" placeholder="Código">
                    <input type="text" id="nombreComprobante" name="nombreComprobante" placeholder="Nombre">
                </div>
                <div class="form-group-admisiones">
                    <label for="responsable">Responsable:</label>
                    <input type="text" id="responsable" name="responsable">
                </div>
            </div>
        </div>

        <!-- Grupo: Datos del Médico -->
        <div class="section-admisiones">
            <div class="section-title-admisiones">Datos del Médico</div>
            <div class="form-row">
                <div class="form-group-admisiones">
                    <label for="medico">Médico:</label>
                    <input type="text" id="codigoMedico" name="codigoMedico" placeholder="Código">
                    <input type="text" id="nombreMedico" name="nombreMedico" placeholder="Nombre">
                </div>
                <div class="form-group-admisiones">
                    <label for="especialidad">Especialidad:</label>
                    <input type="text" id="especialidad" name="especialidad">
                </div>
                <div class="form-group-admisiones">
                    <label for="fechaHora">Fecha / Hora:</label>
                    <input type="text" id="fechaHora" name="fechaHora">
                </div>
            </div>
        </div>

        <table class="table-admisiones">
            <thead>
                <tr>
                    <th>Ítem</th>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="7">Aún no hay registros.</td>
                </tr>
            </tbody>
        </table>
        
        <button id="btnAgregarArticulo" type="button" class="add-btn-admisiones"> + Agregar</button>


        <div class="section-admisiones">
            <div class="form-row">
                <div class="form-group-admisiones">
                    <label for="gastosAdicionales">Gastos Adicionales:</label>
                    <input type="text" id="gastosAdicionales" name="gastosAdicionales">
                </div>
                <div class="form-group-admisiones">
                    <label for="valorVenta">Valor de Venta S/:</label>
                    <input type="text" id="valorVenta" name="valorVenta">
                </div>
                <div class="form-group-admisiones">
                    <label for="igv">% I.G.V.:</label>
                    <input type="text" id="igv" name="igv">
                </div>
                <div class="form-group-admisiones">
                    <label for="total">Total S/:</label>
                    <input type="text" id="total" name="total">
                </div>
                <div class="form-group-admisiones">
                    <label for="copagos">Copagos S/:</label>
                    <input type="text" id="copagos" name="copagos">
                </div>
            </div>
        </div>
        <!-- Botones -->
        <div class="buttons-admisiones">
            <button type="submit" class="btn-admisiones">Guardar</button> 
            <button type="button" class="btn-admisiones">Imprimir</button> 
            <button type="button" class="btn-admisiones" onclick="window.location.href='gso_ListadoAdmisiones.php'">Regresar</button>
        </div>
    </form>
    <?php include '../Modales/modalArticulosPedido.php'; ?>
    <?php include '../Modales/modalDatosPaciente.php';?>
    


    <script src="../Modales/datospaciente.js"></script>
    <script src="../js/RegistroAdmin.js"></script> <!--formatear Fecha-->
</body>
</html>