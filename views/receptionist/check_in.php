<?php require_once 'views/includes/header.php'; ?>

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Nuevo Check-in</h2>
            <p>Rellene los datos del huésped</p>
            <form action="index.php?controller=receptionist&action=checkIn" method="post">
                <div class="form-group mb-3">
                    <label for="room_id">Habitación: <sup>*</sup></label>
                    <select name="room_id" class="form-control form-control-lg <?php echo (!empty($data['room_id_err'])) ? 'is-invalid' : ''; ?>">
                        <option value="">Seleccione Habitación</option>
                        <?php foreach($availableRooms as $room) : ?>
                            <option value="<?php echo $room['id']; ?>" <?php echo ($data['room_id'] == $room['id']) ? 'selected' : ''; ?>>
                                Room <?php echo $room['room_number']; ?> (<?php echo ucfirst($room['room_type']); ?> - $<?php echo $room['price_per_night']; ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <span class="invalid-feedback"><?php echo $data['room_id_err']; ?></span>
                </div>
                <div class="form-group mb-3">
                    <label for="guest_name">Nombre del Húesped <sup>*</sup></label>
                    <input type="text" name="guest_name" class="form-control form-control-lg <?php echo (!empty($data['guest_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['guest_name']; ?>">
                    <span class="invalid-feedback"><?php echo $data['guest_name_err']; ?></span>
                </div>
                <div class="form-group mb-3">
                    <label for="guest_email"> Email del Húesped: <sup>*</sup></label>
                    <input type="email" name="guest_email" class="form-control form-control-lg <?php echo (!empty($data['guest_email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['guest_email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['guest_email_err']; ?></span>
                </div>
                <div class="form-group mb-3">
                    <label for="guest_phone">Teléfono del Húesped: <sup>*</sup></label>
                    <input type="text" name="guest_phone" class="form-control form-control-lg <?php echo (!empty($data['guest_phone_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['guest_phone']; ?>">
                    <span class="invalid-feedback"><?php echo $data['guest_phone_err']; ?></span>
                </div>
                <div class="form-group mb-3">
                    <label for="expected_check_out_date">Fecha prevista de salida: <sup>*</sup></label>
                    <input type="date" name="expected_check_out_date" class="form-control form-control-lg <?php echo (!empty($data['expected_check_out_date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['expected_check_out_date']; ?>">
                    <span class="invalid-feedback"><?php echo $data['expected_check_out_date_err']; ?></span>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <input type="submit" value="Check-in" class="btn btn-success btn-block">
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

