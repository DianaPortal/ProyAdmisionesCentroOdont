<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>
    <nav class="navbar navbar-light bg-primary text-white">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Icono de menú junto al texto CGS Consultores -->
            <div class="d-flex align-items-center">
                <span class="navbar-text text-white me-4">
                    CGS CONSULTORES
                </span>
                <span class="material-icons menu-toggle ms-5" style="cursor: pointer;">menu</span>
            </div>
            <!-- Texto DIANA PORTAL permanece a la derecha -->
            <div class="d-flex align-items-center">
                <span class="material-icons me-3">account_circle</span>
                <span class="navbar-text1 text-white me-5">
                    DIANA PORTAL
                </span>
            </div>
        </div>
    </nav>

    <div class="sidebar">
        <div class="profile">
            <span class="material-icons">account_circle</span>
            <div>
                <span>DIANA PORTAL</span><br>
                <small>ADMIN</small>
            </div>
        </div>
        
        <div class="section-title ms-5 d-flex align-items-center">
                <span class="material-icons me-2">medical_services</span>    
                <span class="section-text">CITAS</span>
                <span class="material-icons ms-5" data-bs-toggle="collapse" data-bs-target="#citas-options" style="cursor: pointer; padding-left: 15%;">arrow_drop_down</span>
            </div>
            <ul id="citas-options" class="collapse ms-5">
                <li><a href="#">Registro Citas</a></li>
            </ul>

            <div class="section-title ms-5 d-flex align-items-center">
                <span class="material-icons me-2">app_registration</span>
                <span class="section-text">ADMISIÓN</span>
                <span class="material-icons ms-5" data-bs-toggle="collapse" data-bs-target="#admission-options" style="cursor: pointer;padding-left: 5%;">arrow_drop_down</span>
            </div>
            <ul id="admission-options" class="collapse ms-3">
                <li><a href="gso_ListadoAdmisiones.php">Listado de Atención</a></li>
                <li><a href="gso_RegistroAdmisiones.php">Registro de Atención</a></li>
            </ul>

            <div class="section-title ms-5 d-flex align-items-center">
                <span class="material-icons me-2">search</span> 
                <span class="section-text">CONSULTAS</span>
                <span class="material-icons ms-5" data-bs-toggle="collapse" data-bs-target="#consultas-options" style="cursor: pointer;">arrow_drop_down</span>
            </div>
            <ul id="consultas-options" class="collapse ms-3">
                <li><a href="#">Opción 1</a></li>
                <li><a href="#">Opción 2</a></li>
            </ul>

            <div class="section-title ms-5 d-flex align-items-center">
                <span class="material-icons me-2">attach_money</span> 
                <span class="section-text">PRESUPUESTO</span>
                <span class="material-icons ms-4" data-bs-toggle="collapse" data-bs-target="#presupuesto-options" style="cursor: pointer;">arrow_drop_down</span>
            </div>
            <ul id="presupuesto-options" class="collapse ms-3">
                <li><a href="#">Opción 1</a></li>
                <li><a href="#">Opción 2</a></li>
            </ul>
    </div>

    <div class="main-content">
        <!--<h1>CGS Consultores</h1>
        <p>Menú principal</p>-->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/dashboard.js"></script> 
</body>
</html>