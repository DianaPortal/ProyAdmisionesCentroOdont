<?php
include('../connection.php');
ini_set('memory_limit', '512M'); 

try {
    // Iniciar  una transacción
    $pdo->beginTransaction();     

    $input = json_decode(file_get_contents('php://input'), true);
    $p_codcmp = isset($input['p_codcmp']) ? $input['p_codcmp'] : null;
    $p_especialidad = isset($input['p_especialidad']) ? $input['p_especialidad'] : null;
    $p_sigper = isset($input['p_sigper']) ? $input['p_sigper'] : null;




    // Configuración de paginación
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Página actual, por defecto 1
    $limit = 20; // Número de registros por página
    $offset = ($page - 1) * $limit; // Calcula el desplazamiento

    // Nombre del cursor
    $cursor_name = 'cursor_gsoBuscarcita';

    // Llamada al procedimiento
    $stmt = $pdo->prepare("CALL public.gso_buscarcita(:p_codcmp, :p_especialidad, :p_sigper,:p_limit, :p_offset, :resultado)");
    $stmt->bindParam(':p_codcmp', $p_codcmp, PDO::PARAM_STR);
    $stmt->bindParam(':p_especialidad', $p_especialidad, PDO::PARAM_STR);
    $stmt->bindParam(':p_sigper', $p_sigper, PDO::PARAM_STR);   
    $stmt->execute();

    // Recuperar los datos del cursor
    $fetch_cursor_stmt = $pdo->prepare("FETCH ALL IN \"$cursor_name\"");
    $fetch_cursor_stmt->execute();
    $resultados = $fetch_cursor_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Cierra el cursor
    $close_cursor_stmt = $pdo->prepare("CLOSE \"$cursor_name\"");
    $close_cursor_stmt->execute();

    $pdo->commit(); 
    // Finalizar la transacción

    // Devuelve los resultados como JSON
    header('Content-Type: application/json');
    echo json_encode([
        'data' => $resultados,
        'pagination' => [
            'current_page' => $page,
            'per_page' => $limit
        ]
    ]);

} catch (PDOException $e) {
    // Revertir la transacción --> error
    $pdo->rollBack(); 
    http_response_code(500);
    echo json_encode(["error" => "Error al ejecutar el procedimiento: " . $e->getMessage()]);
}
