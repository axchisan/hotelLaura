<?php require_once 'views/includes/header.php'; ?>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Check-out</h2>
            <div class="alert alert-info">
                <h4>Detalles de la Reserva</h4>
                <p>
                    <strong>Habitación:</strong> <?php echo $booking['room_number']; ?> (<?php echo ucfirst($booking['room_type']); ?>)<br>
                    <strong>Húesped:</strong> <?php echo $booking['guest_name']; ?><br>
                    <strong>Fecha Check-in:</strong> <?php echo date('M d, Y H:i', strtotime($booking['check_in_date'])); ?><br>
                    <strong>Salida Prevista:</strong> <?php echo date('M d, Y', strtotime($booking['expected_check_out_date'])); ?><br>
                    <strong>Duración de la Estancia:</strong> <?php echo $days; ?> day(s)<br>
                    <strong>Cantidad total:</strong> $<?php echo $total_amount; ?>
                </p>
            </div>
            <form action="index.php?controller=receptionist&action=checkOut&id=<?php echo $booking['id']; ?>" method="post">
                <div class="row mt-4">
                    <div class="col">
                        <input type="submit" value="Confirm Check-out" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="index.php?controller=receptionist&action=dashboard" class="btn btn-light btn-block">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once 'views/includes/footer.php'; ?>

