<?php require_once 'views/includes/header.php'; ?>
<h1 class="mb-4 animate__animated animate__fadeInDown">Habitaciones Disponibles</h1>
<div class="row">
    <?php if(empty($rooms)): ?>
        <div class="col-12">
            <div class="alert alert-info animate__animated animate__fadeIn">
                Actualmente no hay habitaciones disponibles. Vuelva a comprobarlo más tarde.
            </div>
        </div>
    <?php else: ?>
        <?php foreach($rooms as $room) : ?>
            <div class="col-md-4 mb-4 animate__animated animate__fadeIn">
                <div class="card h-100 card-hover">
                    <?php
                    $roomImages = [
                        'standard' => 'assets/img/standard.jpg',
                        'deluxe' => 'assets/img/deluxe.jpg',
                        'suite' => 'assets/img/suite.jpg'
                    ];
                    $imagePath = isset($roomImages[strtolower($room['room_type'])]) ? $roomImages[strtolower($room['room_type'])] : 'assets/img/default.jpg';
                    ?>
                    <img src="<?php echo $imagePath; ?>" class="card-img-top" alt="Imagen de la Habitación">
                    <div class="card-body">
                        <h5 class="card-title">Habitación <?php echo $room['room_number']; ?> <span class="badge bg-success animate__animated animate__pulse">Disponible</span></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo ucfirst($room['room_type']); ?></h6>
                        <p class="card-text">
                            <strong><i class="fas fa-dollar-sign me-2"></i>Precio:</strong> $<?php echo $room['price_per_night']; ?> Noche/Persona<br>
                            <strong><i class="fas fa-users me-2"></i>Capacidad:</strong> <?php echo $room['capacity']; ?> Personas<br>
                            <strong><i class="fas fa-list me-2"></i>Características:</strong> <?php echo $room['features']; ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="index.php?controller=user&action=bookRoom&room_id=<?php echo $room['id']; ?>" class="btn btn-primary w-100 btn-scale"><i class="fas fa-book me-2"></i>Reservar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?php require_once 'views/includes/footer.php'; ?>