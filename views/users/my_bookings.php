<?php require_once 'views/includes/header.php'; ?>

<h1 class="mb-4">Mis Reservas</h1>

<div class="card">
    <div class="card-body">
        <?php if(empty($bookings)): ?>
            <div class="alert alert-info">
            Aún no tienes ninguna reserva. <a href="index.php?controller=user&action=index.php">Buscar habitaciones disponibles</a> para hacer una reservación.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Habitación</th>
                            <th>Tipo</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Status</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($bookings as $booking): ?>
                            <tr>
                                <td>Habitación <?php echo $booking['room_number']; ?></td>
                                <td><?php echo ucfirst($booking['room_type']); ?></td>
                                <td><?php echo date('M d, Y', strtotime($booking['check_in_date'])); ?></td>
                                <td><?php echo date('M d, Y', strtotime($booking['expected_check_out_date'])); ?></td>
                                <td>
                                    <span class="badge bg-<?php echo ($booking['status'] == 'active') ? 'success' : 'secondary'; ?>">
                                        <?php echo ucfirst($booking['status']); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if($booking['total_amount']): ?>
                                        $<?php echo $booking['total_amount']; ?>
                                    <?php else: ?>
                                        <?php 
                                            // Calculate estimated total
                                            $check_in = new DateTime($booking['check_in_date']);
                                            $check_out = new DateTime($booking['expected_check_out_date']);
                                            $interval = $check_in->diff($check_out);
                                            $days = $interval->days > 0 ? $interval->days : 1;
                                            $estimated_total = $days * $booking['price_per_night'];
                                            echo '$' . $estimated_total . ' (estimated)';
                                        ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'views/includes/footer.php'; ?>

