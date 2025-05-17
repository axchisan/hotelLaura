<?php require_once 'views/includes/header.php'; ?>

<h1 class="mb-4">Habitaciones Disponibles</h1>

<div class="row">
    <?php if(empty($rooms)): ?>
        <div class="col-12">
            <div class="alert alert-info">
            Actualmente no hay habitaciones disponibles. Vuelva a comprobarlo más tarde.
            </div>
        </div>
    <?php else: ?>
        <?php foreach($rooms as $room) : ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                <?php
    // Definir imágenes según el tipo de habitación
    $roomImages = [
        'standard' => 'assets/img/standard.jpg',
        'deluxe' => 'assets/img/deluxe.jpg',
        'suite' => 'assets/img/suite.jpg'
    ];

    // Obtener la imagen correspondiente al tipo de habitación
    $imagePath = isset($roomImages[strtolower($room['room_type'])]) ? $roomImages[strtolower($room['room_type'])] : 'assets/img/default.jpg';
?>

<img src="<?php echo $imagePath; ?>" class="card-img-top" alt="Room Image">

                    <div class="card-body">
                        <h5 class="card-title">Habitación <?php echo $room['room_number']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo ucfirst($room['room_type']); ?></h6>
                        <p class="card-text">
                            <strong>Precio: </strong> $<?php echo $room['price_per_night']; ?> Noche/Persona<br>
                            <strong>Capacidad:</strong> <?php echo $room['capacity']; ?> Personas<br>
                            <strong>Características :</strong> <?php echo $room['features']; ?>
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="index.php?controller=user&action=bookRoom&room_id=<?php echo $room['id']; ?>" class="btn btn-primary w-100">Reservar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php require_once 'views/includes/footer.php'; ?>

