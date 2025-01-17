<?php
include('../connection.php');
ini_set('memory_limit', '512M'); 

try {
    // Iniciar  una transacción
    $pdo->beginTransaction(); 

     // Variables de entrada --> recibir los datos
    $input = json_decode(file_get_contents('php://input'), true);
    $p_codcli = isset($input['p_codcli']) ? $input['p_codcli'] : null;
    $p_nomcli = isset($input['p_nomcli']) ? $input['p_nomcli'] : null;
    $p_nrooc = isset($input['p_nrooc']) ? $input['p_nrooc'] : null;
    $p_tipest = isset($input['p_tipest']) ? $input['p_tipest'] : null;
    $p_fchini = isset($input['p_fchini']) ? $input['p_fchini'] : null;
    $p_fchfin = isset($input['p_fchfin']) ? $input['p_fchfin'] : null;



    // Configuración de paginación
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Página actual, por defecto 1
    $limit = 20; // Número de registros por página
    $offset = ($page - 1) * $limit; // Calcula el desplazamiento

    // Nombre del cursor
    $cursor_name = 'cursor_gsoAdminquery';

    // Llamada al procedimiento
    $stmt = $pdo->prepare("CALL public.gso_admisionquery(:p_codcli, :p_nomcli, :p_nrooc, :p_tipest, :p_fchini, :p_fchfin, :p_limit, :p_offset, :resultado)");
    $stmt->bindParam(':p_codcli', $p_codcli, PDO::PARAM_STR);
    $stmt->bindParam(':p_nomcli', $p_nomcli, PDO::PARAM_STR);
    $stmt->bindParam(':p_nrooc', $p_nrooc, PDO::PARAM_STR);
    $stmt->bindParam(':p_tipest', $p_tipest, PDO::PARAM_STR);
    $stmt->bindParam(':p_fchini', $p_fchini, PDO::PARAM_STR);
    $stmt->bindParam(':p_fchfin', $p_fchfin, PDO::PARAM_STR);
    $stmt->bindParam(':p_limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':p_offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':resultado', $cursor_name, PDO::PARAM_STR);

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
            'currentpage' => $page,
            'perpage' => $limit
        ]
    ]);

} catch (PDOException $e) {
    // Revertir la transacción --> error
    $pdo->rollBack(); 
    http_response_code(500);
    echo json_encode(["error" => "Error al ejecutar el procedimiento: " . $e->getMessage()]);
}
