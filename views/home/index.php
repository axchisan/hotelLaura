<?php require_once 'views/includes/header.php'; ?>

<div class="jumbotron">
    <h1 class="display-4">Bienvenidos al mejor Hotel</h1>
    <p class="lead">Viva una experiencia inolvidable junto al mar, sin pagar de más.</p>
    <hr class="my-4">
    <p>Descubra un rincón junto al mar, hecho para usted.</p>
    <a class="btn btn-primary btn-lg" href="index.php?controller=user&action=login" role="button">Reserva Ahora</a>
</div>

<div class="row mt-5">
    <div class="col-md-4">
        <div class="card mb-4">
            <img src="assets/img/suite.jpeg" class="card-img-top" alt="Luxury Room">
            <div class="card-body">
                <h5 class="card-title">Suite Amanecer</h5>
                <p class="card-text">Suite Atardecer del Paraíso 
                    Elegancia, confort y una vista inolvidable al mar desde tu propia terraza.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4">
            <img src="assets/img/Doble Brisa.jpeg" class="card-img-top" alt="Standard Room">
            <div class="card-body">
                <h5 class="card-title">Habitación Doble Brisa </h5>
                <p class="card-text">Frescura, comodidad y una vista azul que enamora..</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-4">
            <img src="assets/img/Bungalow.jpeg" class="card-img-top" alt="Suite">
            <div class="card-body">
                <h5 class="card-title">Bungalow Arena Privado</h5>
                <p class="card-text">Exclusividad sobre el mar, con piscina privada y vistas infinitas.</p>
            </div>
        </div>
    </div>
</div>

<?php require_once 'views/includes/footer.php'; ?>

