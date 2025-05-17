<?php
class Booking {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    public function checkIn($data) {
        $this->db->query('INSERT INTO bookings (room_id, guest_name, guest_email, guest_phone, check_in_date, expected_check_out_date, created_by) 
                          VALUES (:room_id, :guest_name, :guest_email, :guest_phone, :check_in_date, :expected_check_out_date, :created_by)');

        $this->db->bind(':room_id', $data['room_id']);
        $this->db->bind(':guest_name', $data['guest_name']);
        $this->db->bind(':guest_email', $data['guest_email']);
        $this->db->bind(':guest_phone', $data['guest_phone']);
        $this->db->bind(':check_in_date', $data['check_in_date']);
        $this->db->bind(':expected_check_out_date', $data['expected_check_out_date']);
        $this->db->bind(':created_by', $data['created_by']);

        if($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function checkOut($id, $check_out_date, $total_amount) {
 
        $this->db->query('UPDATE bookings SET check_out_date = :check_out_date, total_amount = :total_amount, status = "completed" WHERE id = :id');

        $this->db->bind(':id', $id);
        $this->db->bind(':check_out_date', $check_out_date);
        $this->db->bind(':total_amount', $total_amount);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getActiveBookings() {
        $this->db->query('SELECT b.*, r.room_number, r.room_type, r.price_per_night 
                          FROM bookings b 
                          JOIN rooms r ON b.room_id = r.id 
                          WHERE b.status = "active" 
                          ORDER BY b.check_in_date DESC');
        return $this->db->resultSet();
    }
    public function getBookingById($id) {
        $this->db->query('SELECT b.*, r.room_number, r.room_type, r.price_per_night 
                          FROM bookings b 
                          JOIN rooms r ON b.room_id = r.id 
                          WHERE b.id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    public function getBookingsByRoomId($room_id) {
        $this->db->query('SELECT * FROM bookings WHERE room_id = :room_id AND status = "active"');
        $this->db->bind(':room_id', $room_id);
        return $this->db->resultSet();
    }
}
?>

