<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Hotelera</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand animate__animated animate__fadeIn" href="index.php">
                <i class="fas fa-hotel me-2"></i>Gestión Hotelera
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link animate__animated animate__fadeInLeft" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link animate__animated animate__fadeInLeft" href="index.php?controller=home&action=about">Sobre Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link animate__animated animate__fadeInLeft" href="index.php?controller=home&action=contact">Contacto</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <?php if (isset($_SESSION['user_id'])) : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle animate__animated animate__fadeInRight" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['user_name']; ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php if ($_SESSION['user_role'] == 'receptionist') : ?>
                                    <li><a class="dropdown-item" href="index.php?controller=receptionist&action=dashboard">Panel de Control</a></li>
                                <?php else : ?>
                                    <li><a class="dropdown-item" href="index.php?controller=user&action=dashboard">Panel de Control</a></li>
                                    <li><a class="dropdown-item" href="index.php?controller=user&action=myBookings">Mis Reservas</a></li>
                                <?php endif; ?>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="index.php?controller=user&action=logout">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link animate__animated animate__fadeInRight" href="index.php?controller=user&action=login">Iniciar Sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link animate__animated animate__fadeInRight" href="index.php?controller=user&action=register">Registrarse</a></li>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <?php if (isset($_SESSION['flash_message'])) : ?>
            <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeIn" role="alert">
                <?php echo $_SESSION['flash_message'];
                unset($_SESSION['flash_message']); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>