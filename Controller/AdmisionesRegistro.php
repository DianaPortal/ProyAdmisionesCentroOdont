<?php

// Incluir el archivo de conexión
include '../connection.php'; // Asegúrate de que la ruta sea correcta

// Función para ejecutar el procedimiento almacenado
function ejecutarProcedimientoSotapedi($accion, $obj, $pdo) {
    try {
        // Preparar el llamado al procedimiento almacenado
        $sql = "CALL public.oa_registro(:accion, :obj)";
        $stmt = $pdo->prepare($sql);

        // Enlazar los parámetros
        $stmt->bindParam(':accion', $accion, PDO::PARAM_STR);
        $stmt->bindParam(':obj', json_encode($obj), PDO::PARAM_STR);

        // Ejecutar el procedimiento almacenado
        $stmt->execute();

        // Redirigir con mensaje de éxito
        header("Location: ../Views/gso_RegistroAdmisiones.php?success=true");
        exit();
    } catch (PDOException $e) {
        // Redirigir con mensaje de error
        header("Location: ../Views/gso_RegistroAdmisiones.php?error=" . urlencode($e->getMessage()));
        exit();
    }
}

// Procesar el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Recoger los datos del formulario
    $nroo_c = $_POST['nroo_c'];
    $codcli = $_POST['codcli'];
    $fcho_c = $_POST['fcho_c'];
    $placa = $_POST['placa'];
    $accion = $_POST['accion'];

    // Definir el array de datos a pasar al procedimiento almacenado
    $obj = [
        'nroo_c' => $nroo_c,
        'codcli' => $codcli,
        'fcho_c' => $fcho_c,
        'placa' => $placa
    ];

    // Llamar a la función para ejecutar el procedimiento con la conexión ya establecida
    ejecutarProcedimientoSotapedi($accion, $obj, $pdo);
} else {
    // Redirigir si no se envió el formulario correctamente
    header("Location: ../Views/gso_RegistroAdmisiones.php");
    exit();
}
