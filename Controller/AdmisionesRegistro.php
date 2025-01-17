
<?php


// Incluir conexión a la base de datos
include '../connection.php';


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

// Obtener el estado de la factura
function obtenerEstadoFactura($pdo) {
    try {
        $sql = "SELECT estfac FROM sotapedi WHERE estfac = 'P' LIMIT 1";
        $result = $pdo->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return $row['estfac']; // Devuelve 'P'
        } else {
            return 'P'; // Valor por defecto corregido
        }
    } catch (PDOException $e) {
        die("Error al obtener el estado de la factura: " . $e->getMessage());
    }
}


// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    
    try {
        $accion = $_POST['accion'] ?? 'insertar';
        // Validación de datos requeridos
      
        // Recoger datos del formulario
      
        $nroo_c = htmlspecialchars($_POST['nroo_c']);
        $estfac = htmlspecialchars($_POST['estfac']);
        $fcho_c =!empty($_POST['fecha']) ? date('Y-m-d', strtotime($_POST['fecha'])) : NULL;
        $hrao_c =!empty($_POST['hora']) ? date('H:i:s', strtotime($_POST['hora'])) : NULL;
        $codcli = htmlspecialchars($_POST['codcli'] ?? '');
        $nomcli = htmlspecialchars($_POST['nomcli'] ?? '');
        $dircli = htmlspecialchars($_POST['dircli'] ?? '');
        $tlfper = htmlspecialchars($_POST['tlfper'] ?? '');
        $nrodid = htmlspecialchars($_POST['nrodid'] ?? '');
        $codcre = htmlspecialchars($_POST['codcre'] ?? '');
        $codmon = htmlspecialchars($_POST['codmon'] ?? '');
        $codpgo = htmlspecialchars($_POST['codpgo'] ?? '');
        $codcmp = htmlspecialchars($_POST['codcmp'] ?? '');
        $valdoc = htmlspecialchars($_POST['valdoc'] ?? '');
        $impsol = htmlspecialchars($_POST['impsol'] ?? '');
        $totsol = htmlspecialchars($_POST['totsol'] ?? '');
      
        
        
        // Crear objeto JSON con los datos
        $obj = json_encode([
            'nroo_c' => $nroo_c,
            'estfac' => $estadoFactura,
            'fcho_c' => $fcho_c,
            'hrao_c' => $hrao_c,
            'codcli' => null,
            'nomcli' => null,
            'dircli' => null,
            'tlfper' => null,
            'nrodid' => null,
            'codcre' => null,
            'codmon' => null,
            'codpgo' => null,
            'codcmp' => null,
            'valdoc' => null,
            'impsol' => null,
            'totsol' => null
        ]);

        // Depuración: Mostrar los datos antes de enviarlos
        echo "<pre>Datos enviados al procedimiento:\n";
        echo "Acción: $accion\n";       
        echo "JSON: " . json_encode($obj, JSON_PRETTY_PRINT);
        echo "</pre>";
     

        // Ejecutar el procedimiento almacenado
        ejecutarProcedimientoSotapedi($accion, $obj, $pdo);

        echo "Datos insertados correctamente.";
        exit();

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
}

// Obtener el siguiente número de orden
$nroo_c = obtenerSiguienteNumeroOrden($pdo);

// Obtener el estado de la factura
$estadoFactura = obtenerEstadoFactura($pdo);

// Función para ejecutar el procedimiento almacenado
function ejecutarProcedimientoSotapedi($accion, $obj, $pdo) {
    try {
        $sql = "CALL public.gso_admisionregistro(:accion, :obj)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':accion', $accion, PDO::PARAM_STR);
        $stmt->bindParam(':obj', $obj, PDO::PARAM_STR);
        $stmt->execute();
        print_r($stmt->errorInfo());
        echo "Procedimiento almacenado ejecutado con éxito.";
    } catch (PDOException $e) {
        die("Error al ejecutar el procedimiento almacenado: " . $e->getMessage());
    }
}
?>