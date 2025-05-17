<?php require_once 'views/includes/header.php'; ?>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Reservar una Habitación</h2>
            <p>Rellene los datos de la reserva</p>
            
            <div class="row mb-4">
                <div class="col-md-6">
                <?php
    $roomImages = [
        'standard' => 'assets/img/standard.jpg',
        'deluxe' => 'assets/img/deluxe.jpg',
        'suite' => 'assets/img/suite.jpg'
    ];
    $imagePath = isset($roomImages[strtolower($room['room_type'])]) ? $roomImages[strtolower($room['room_type'])] : 'assets/img/default.jpg';
?>

<img src="<?php echo $imagePath; ?>" class="card-img-top" alt="Room Image">

                </div>
                <div class="col-md-6">
                    <h3>Habitación <?php echo $room['room_number']; ?></h3>
                    <p><strong>Tipo:</strong> <?php echo ucfirst($room['room_type']); ?></p>
                    <p><strong>Precio:</strong> $<?php echo $room['price_per_night']; ?> Noche</p>
                    <p><strong>Capacidad:</strong> <?php echo $room['capacity']; ?> Personas</p>
                    <p><strong>Características:</strong> <?php echo $room['features']; ?></p>
                </div>
            </div>
            
            <form action="index.php?controller=user&action=bookRoom" method="post">
                <input type="hidden" name="room_id" value="<?php echo $data['room_id']; ?>">
                
                <div class="form-group mb-3">
                    <label for="check_in_date">Fecha Check-in: <sup>*</sup></label>
                    <input type="date" name="check_in_date" class="form-control form-control-lg <?php echo (!empty($data['check_in_date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['check_in_date']; ?>">
                    <span class="invalid-feedback"><?php echo $data['check_in_date_err']; ?></span>
                </div>
                
                <div class="form-group mb-3">
                    <label for="check_out_date">Fecha Check-out: <sup>*</sup></label>
                    <input type="date" name="check_out_date" class="form-control form-control-lg <?php echo (!empty($data['check_out_date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['check_out_date']; ?>">
                    <span class="invalid-feedback"><?php echo $data['check_out_date_err']; ?></span>
                </div>
                
                <div class="row mt-4">
                    <div class="col">
                        <input type="submit" value="Reservar Habitacion" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="index.php?controller=user&action=dashboard" class="btn btn-light btn-block">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once 'views/includes/footer.php'; ?>

