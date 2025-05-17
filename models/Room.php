<?php
class Room {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    public function getRooms() {
        $this->db->query('SELECT * FROM rooms ORDER BY room_number');
        return $this->db->resultSet();
    }
    public function getAvailableRooms() {
        $this->db->query('SELECT * FROM rooms WHERE status = "available" ORDER BY room_number');
        return $this->db->resultSet();
    }
    public function getRoomById($id) {
        $this->db->query('SELECT * FROM rooms WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    public function updateRoomStatus($id, $status) {
        $this->db->query('UPDATE rooms SET status = :status WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', $status);
        
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>

