<?php require_once 'views/includes/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Receptionist Dashboard</h1>
    <a href="index.php?controller=receptionist&action=checkIn" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nuevo Check-in
    </a>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Estado de la Habitación</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Habitación #</th>
                                <th>Tipo</th>
                                <th>Precio</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rooms as $room) : ?>
                                <tr>
                                    <td><?php echo $room['room_number']; ?></td>
                                    <td><?php echo ucfirst($room['room_type']); ?></td>
                                    <td>$<?php echo $room['price_per_night']; ?></td>
                                    <td>
                                        <span class="badge bg-<?php echo ($room['status'] == 'available') ? 'success' : 'danger'; ?>">
                                            <?php echo ucfirst($room['status']); ?>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Reservas Activas</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Habitación #</th>
                                <th>Húesped</th>
                                <th>Check-in</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($activeBookings)) : ?>
                                <tr>
                                    <td colspan="4" class="text-center">No Reservas Activas</td>
                                </tr>
                            <?php else : ?>
                                <?php foreach($activeBookings as $booking) : ?>
                                    <tr>
                                        <td><?php echo $booking['room_number']; ?></td>
                                        <td><?php echo $booking['guest_name']; ?></td>
                                        <td><?php echo date('M d, Y', strtotime($booking['check_in_date'])); ?></td>
                                        <td>
                                            <a href="index.php?controller=receptionist&action=checkOut&id=<?php echo $booking['id']; ?>" class="btn btn-sm btn-warning">
                                                Check-out
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'views/includes/footer.php'; ?>

