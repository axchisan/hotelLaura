<?php
class ReceptionistController {
    private $userModel;
    private $roomModel;
    private $bookingModel;
    
    public function __construct() {
        $this->userModel = new User();
        $this->roomModel = new Room();
        $this->bookingModel = new Booking();
        if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'receptionist') {
            header('Location: index.php?controller=user&action=login');
            exit;
        }
    }
    
    public function dashboard() {
        $rooms = $this->roomModel->getRooms();
        $activeBookings = $this->bookingModel->getActiveBookings();
        require_once 'views/receptionist/dashboard.php';
    }
    public function checkIn() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'room_id' => trim($_POST['room_id']),
                'guest_name' => trim($_POST['guest_name']),
                'guest_email' => trim($_POST['guest_email']),
                'guest_phone' => trim($_POST['guest_phone']),
                'check_in_date' => date('Y-m-d H:i:s'), // Current date and time
                'expected_check_out_date' => trim($_POST['expected_check_out_date']),
                'created_by' => $_SESSION['user_id'],
                'room_id_err' => '',
                'guest_name_err' => '',
                'guest_email_err' => '',
                'guest_phone_err' => '',
                'expected_check_out_date_err' => ''
            ];
            if(empty($data['room_id'])) {
                $data['room_id_err'] = 'Por favor seleccione una habitación';
            } else {
                $room = $this->roomModel->getRoomById($data['room_id']);
                if(!$room) {
                    $data['room_id_err'] = 'La habitación no existe';
                } elseif($room['status'] != 'available') {
                    $data['room_id_err'] = 'La habitación no está disponible';
                }
            }
            if(empty($data['guest_name'])) {
                $data['guest_name_err'] = 'Por favor ingrese el nombre del huésped';
            }
            if(empty($data['guest_email'])) {
                $data['guest_email_err'] = 'Por favor ingrese el correo del huésped';
            } elseif(!filter_var($data['guest_email'], FILTER_VALIDATE_EMAIL)) {
                $data['guest_email_err'] = 'Por favor ingrese un correo válido';
            }
            if(empty($data['guest_phone'])) {
                $data['guest_phone_err'] = 'Por favor ingrese el teléfono del huésped';
            }
            if(empty($data['expected_check_out_date'])) {
                $data['expected_check_out_date_err'] = 'Por favor ingrese la fecha de salida esperada';
            } elseif(strtotime($data['expected_check_out_date']) <= time()) {
                $data['expected_check_out_date_err'] = 'La fecha de salida esperada debe ser en el futuro';
            }

            if(empty($data['room_id_err']) && empty($data['guest_name_err']) && empty($data['guest_email_err']) && 
               empty($data['guest_phone_err']) && empty($data['expected_check_out_date_err'])) {
                $booking_id = $this->bookingModel->checkIn($data);
                
                if($booking_id) {
                    $this->roomModel->updateRoomStatus($data['room_id'], 'occupied');
                    $_SESSION['flash_message'] = 'Registro exitoso';
                    header('Location: index.php?controller=receptionist&action=dashboard');
                } else {
                    die('Algo salió mal');
                }
            } else {
                $availableRooms = $this->roomModel->getAvailableRooms();
                require_once 'views/receptionist/check_in.php';
            }
        } else {
            $availableRooms = $this->roomModel->getAvailableRooms();

            $data = [
                'room_id' => '',
                'guest_name' => '',
                'guest_email' => '',
                'guest_phone' => '',
                'check_in_date' => '',
                'expected_check_out_date' => '',
                'created_by' => '',
                'room_id_err' => '',
                'guest_name_err' => '',
                'guest_email_err' => '',
                'guest_phone_err' => '',
                'expected_check_out_date_err' => ''
            ];

            require_once 'views/receptionist/check_in.php';
        }
    }
    
    public function checkOut($id = null) {
        if($id === null && isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        
        if(!$id) {
            header('Location: index.php?controller=receptionist&action=dashboard');
            return;
        }
        $booking = $this->bookingModel->getBookingById($id);
        
        if(!$booking) {
            $_SESSION['flash_message'] = 'Reserva no encontrada';
            header('Location: index.php?controller=receptionist&action=dashboard');
            return;
        }
        
        if($booking['status'] != 'active') {
            $_SESSION['flash_message'] = 'Reserva ya registrada';
            header('Location: index.php?controller=receptionist&action=dashboard');
            return;
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $check_in_date = new DateTime($booking['check_in_date']);
            $check_out_date = new DateTime();
            $interval = $check_in_date->diff($check_out_date);
            $days = $interval->days > 0 ? $interval->days : 1; 
            $total_amount = $days * $booking['price_per_night'];
            if($this->bookingModel->checkOut($id, date('Y-m-d H:i:s'), $total_amount)) {
                $this->roomModel->updateRoomStatus($booking['room_id'], 'available');
                $_SESSION['flash_message'] = 'Registro exitoso. Total: $' . $total_amount;
                header('Location: index.php?controller=receptionist&action=dashboard');
            } else {
                die('Algo salió mal');
            }
        } else {
            $check_in_date = new DateTime($booking['check_in_date']);
            $check_out_date = new DateTime();
            $interval = $check_in_date->diff($check_out_date);
            $days = $interval->days > 0 ? $interval->days : 1;
            $total_amount = $days * $booking['price_per_night'];
            require_once 'views/receptionist/check_out.php';
        }
    }
}
?>