<?php

// Incluir el archivo de conexión
include '../connection.php'; // Asegúrate de que la ruta sea correcta

// Obtener el último número de orden y generar el siguiente
function obtenerSiguienteNumeroOrden($pdo) {
    try {
        $query = 'SELECT "nroo_c" FROM "sotapedi" ORDER BY "nroo_c" DESC LIMIT 1';
        $result = $pdo->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $lastOrderNumber = $row['nroo_c'];
            $prefix = substr($lastOrderNumber, 0, 1);
            $number = (int)substr($lastOrderNumber, 1);
            $newOrderNumber = $prefix . str_pad($number + 1, 7, '0', STR_PAD_LEFT);
            return $newOrderNumber;
        } else {
            return 'A0000001'; // Valor inicial si la tabla está vacía
        }
    } catch (PDOException $e) {
        die("Error al obtener el número de orden: " . $e->getMessage());
    }
}

// Procesar el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Recoger los datos del formulario
    
    /*Nro. de Orden, Estado, Fecha, Hora */
    $nroo_c = $_POST['nroo_c']; // NRo de orden
    $estfac = $_POST['estfac']; // Estado de factura
    $fcho_c = $_POST['fcho_c']; // Fecha
    $hrao_c = $_POST['hrao_c']; // Hora

    /*Datos del cliente*/
    $codcli = $_POST['codcli']; // Código cliente
    $nomcli = $_POST['nomcli']; // Nombre cliente
    $dircli = $_POST['dircli']; // Dirección
    $tlfper = $_POST['tlfper']; // Teléfono
    $nrodid = $_POST['nrodid']; // Documento de identidad

    /*Datos del pago*/
    $tipopacient = $_POST['codper']; // Tipo de Paciente
    $codcre = $_POST['codcre']; // Código forma de pago
    $codmon = $_POST['codmon']; // Código Moneda
    $codpgo = $_POST['codpgo']; // Código Comprobante de pago

    /*Datos del Médico */
    $codcmp = $_POST['codcmp']; // Código médico

    /*Gastos*/
    $igv18 = $_POST['igv18']; // IGV 18%
    $valdoc = $_POST['valdoc']; // Valor de Venta
    $impsol = $_POST['impsol']; // Impuesto IGV
    $totsol = $_POST['totsol']; // Total S/

    // Definir el array de datos a pasar al procedimiento almacenado
    $obj = [
        'nroo_c' => $nroo_c,
        'estfac' => $estfac,
        'fcho_c' => $fcho_c,
        'hrao_c' => $hrao_c,
        'codcli' => $codcli,
        'nomcli' => $nomcli,
        'dircli' => $dircli,
        'tlfper' => $tlfper,
        'nrodid' => $nrodid,
        /*'tipopacient' => $tipopacient,*/
        'codcre' => $codcre,
        'codmon' => $codmon,
        'codpgo' => $codpgo,
        'codcmp' => $codcmp,
        /*'igv18' => $igv18,*/
        'valdoc' => $valdoc,
        'impsol' => $impsol,
        'totsol' => $totsol
    ];

    // Ejecutar el procedimiento almacenado
    ejecutarProcedimientoSotapedi('INSERT', $obj, $pdo);

    // Redirigir después de guardar
    header("Location: ../Views/gso_RegistroAdmisiones.php?success=true");
    exit();
}

// Obtener el siguiente número de orden para la vista
$nroo_c = obtenerSiguienteNumeroOrden($pdo);

// Función para ejecutar el procedimiento almacenado
function ejecutarProcedimientoSotapedi($accion, $obj, $pdo) {
    try {
        $sql = "CALL public.gso_admisionregistro(:accion, :obj)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':accion', $accion, PDO::PARAM_STR);
        $stmt->bindParam(':obj', json_encode($obj), PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        die("Error al ejecutar el procedimiento almacenado: " . $e->getMessage());
    }
}
?>
