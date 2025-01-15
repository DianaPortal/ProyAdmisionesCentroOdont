<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modal Registro de Artículos</title>
    <link rel="stylesheet" href="../Modales/modales.css">
</head>
<body>
    

    <!-- Modal "modalArticulosPedido" -->
    <div id="modalArticulosPedido" class="modal">
    <div class="modal-content modal-large">
        <div class="modal-header">
            <h2>Registro de Artículos de Pedido</h2>
            <button class="close-modal">&times;</button>
        </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="item">Item:</label>
                        <input type="text" id="item" name="item" value="001" readonly>
                    </div>
                    <div class="form-group">
                        <label for="codigo">Código:</label>
                        <button id="btnCodRegArtPed" type="button" class="small-btn">...</button>
                        <input type="text" id="codigo" name="codigo">
                        
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" id="descripcion" name="descripcion">
                    </div>
                    <div class="form-group">
                        <label for="unidadStock">Unidad de stock:</label>
                        <input type="text" id="unidadStock" name="unidadStock">
                    </div>
                    <div class="form-group">                        
                        <label for="nroSerieLote">Nro. serie/Lote:</label>
                        <button type="button" class="small-btn"> </button>
                        <input type="text" id="nroSerieLote" name="nroSerieLote">
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad:</label>
                        <input type="number" id="cantidad" name="cantidad" value="0.00">
                    </div>
                    <div class="form-group">
                        <label for="precioUnitario">Precio unitario S/:</label>
                        <input type="number" id="precioUnitario" name="precioUnitario" value="0.00">
                    </div>
                    <div class="form-group">
                        <label for="total">Total:</label>
                        <input type="number" id="total" name="total" value="0.00">
                    </div>
                    <div class="form-group">
                        <label for="descuento">Descuento:</label>
                        <input type="number" id="descuento" name="descuento" value="0.00" class="input-error">
                    </div>
                    <div class="form-group">
                        <label for="precioIncluidoDescuento">Precio unitario (inc. dto):</label>
                        <input type="number" id="precioIncluidoDescuento" name="precioIncluidoDescuento" value="0.00">
                    </div>
                    <div class="form-group">
                        <label for="totalFinal">Total S/:</label>
                        <input type="number" id="totalFinal" name="totalFinal" value="0.00">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn-save">GRABAR</button>
                <button class="btn-back">REGRESAR</button>
            </div>
        </div>
    </div>
    <?php include '../Modales/modalBusquedaArticulos.html';?>
    <script src="../Modales/datospaciente.js"></script>

</body>
</html>
