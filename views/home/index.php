<?php require_once 'views/includes/header.php'; ?>
<div id="carouselExampleIndicators" class="carousel slide jumbotron" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/img/suite.jpeg" class="d-block w-100 carousel-img" alt="Suite Amanecer">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="display-4 animate__animated animate__fadeInDown">Bienvenidos al Mejor Hotel</h1>
                <p class="lead animate__animated animate__fadeInUp">Viva una experiencia inolvidable junto al mar, sin pagar de más.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/img/Doble Brisa.jpeg" class="d-block w-100 carousel-img" alt="Habitación Doble Brisa">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="display-4 animate__animated animate__fadeInDown">Relájate y Disfruta</h1>
                <p class="lead animate__animated animate__fadeInUp">Un rincón de serenidad junto al mar te espera.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="assets/img/Bungalow.jpeg" class="d-block w-100 carousel-img" alt="Bungalow Arena Privado">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="display-4 animate__animated animate__fadeInDown">Lujo y Privacidad</h1>
                <p class="lead animate__animated animate__fadeInUp">Tu escapada perfecta con piscina privada.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
    <div class="text-center mt-4">
        <a class="btn btn-primary btn-lg btn-scale" href="index.php?controller=user&action=login" role="button"><i class="fas fa-book me-2"></i>Reserva Ahora</a>
    </div>
</div>
<div class="row mt-5">
    <div class="col-md-4 animate__animated animate__fadeInLeft">
        <div class="card mb-4 card-hover">
            <img src="assets/img/suite.jpeg" class="card-img-top" alt="Suite Amanecer">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-sun me-2 text-warning"></i>Suite Amanecer</h5>
                <p class="card-text">Elegancia, confort y una vista inolvidable al mar desde tu propia terraza.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 animate__animated animate__fadeIn">
        <div class="card mb-4 card-hover">
            <img src="assets/img/Doble Brisa.jpeg" class="card-img-top" alt="Habitación Doble Brisa">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-wind me-2 text-info"></i>Habitación Doble Brisa</h5>
                <p class="card-text">Frescura, comodidad y una vista azul que enamora.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 animate__animated animate__fadeInRight">
        <div class="card mb-4 card-hover">
            <img src="assets/img/Bungalow.jpeg" class="card-img-top" alt="Bungalow Arena Privado">
            <div class="card-body">
                <h5 class="card-title"><i class="fas fa-umbrella-beach me-2 text-primary"></i>Bungalow Arena Privado</h5>
                <p class="card-text">Exclusividad sobre el mar, con piscina privada y vistas infinitas.</p>
            </div>
        </div>
    </div>
</div>
<?php require_once 'views/includes/footer.php'; ?>