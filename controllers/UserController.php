<?php
class UserController {
    private $userModel;
    private $roomModel;
    private $bookingModel;
    
    public function __construct() {
        $this->userModel = new User();
        $this->roomModel = new Room();
        $this->bookingModel = new Booking();
    }
    
    public function register() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'role' => 'user',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else {
                if($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                }
            }
            if(empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            } elseif(strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }
            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            } else {
                if($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                }
            }
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                if($this->userModel->register($data)) {
                    $_SESSION['flash_message'] = 'You are registered and can log in';
                    header('Location: index.php?controller=user&action=login');
                } else {
                    die('Something went wrong');
                }
            } else {
                require_once 'views/users/register.php';
            }
        } else {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'role' => 'user',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            require_once 'views/users/register.php';
        }
    }
    
    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => ''
            ];
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }
            if(!$this->userModel->findUserByEmail($data['email'])) {
                $data['email_err'] = 'No user found';
            }
            if(empty($data['email_err']) && empty($data['password_err'])) {
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                
                if($loggedInUser) {
                    $_SESSION['user_id'] = $loggedInUser['id'];
                    $_SESSION['user_email'] = $loggedInUser['email'];
                    $_SESSION['user_name'] = $loggedInUser['name'];
                    $_SESSION['user_role'] = $loggedInUser['role'];
                    if($loggedInUser['role'] == 'receptionist') {
                        header('Location: index.php?controller=receptionist&action=dashboard');
                    } else {
                        header('Location: index.php?controller=user&action=dashboard');
                    }
                } else {
                    $data['password_err'] = 'Password incorrect';
                    require_once 'views/users/login.php';
                }
            } else {
                require_once 'views/users/login.php';
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
            require_once 'views/users/login.php';
        }
    }
    
    public function logout() {
        $_SESSION = array();
        session_destroy();
        header('Location: index.php?controller=user&action=login');
    }
    
    public function dashboard() {
        if(!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            return;
        }
        $rooms = $this->roomModel->getAvailableRooms();
        require_once 'views/users/dashboard.php';
    }
    
    public function bookRoom() {
        if(!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            return;
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'room_id' => trim($_POST['room_id']),
                'check_in_date' => trim($_POST['check_in_date']),
                'check_out_date' => trim($_POST['check_out_date']),
                'room_id_err' => '',
                'check_in_date_err' => '',
                'check_out_date_err' => ''
            ];
            if(empty($data['room_id'])) {
                $data['room_id_err'] = 'Please select a room';
            } else {
                $room = $this->roomModel->getRoomById($data['room_id']);
                if(!$room) {
                    $data['room_id_err'] = 'Room does not exist';
                } elseif($room['status'] != 'available') {
                    $data['room_id_err'] = 'Room is not available';
                }
            }
            if(empty($data['check_in_date'])) {
                $data['check_in_date_err'] = 'Please enter check-in date';
            } elseif(strtotime($data['check_in_date']) < strtotime(date('Y-m-d'))) {
                $data['check_in_date_err'] = 'Check-in date must be today or in the future';
            }
            if(empty($data['check_out_date'])) {
                $data['check_out_date_err'] = 'Please enter check-out date';
            } elseif(strtotime($data['check_out_date']) <= strtotime($data['check_in_date'])) {
                $data['check_out_date_err'] = 'Check-out date must be after check-in date';
            }
            if(empty($data['room_id_err']) && empty($data['check_in_date_err']) && empty($data['check_out_date_err'])) {
                $bookingData = [
                    'room_id' => $data['room_id'],
                    'guest_name' => $_SESSION['user_name'],
                    'guest_email' => $_SESSION['user_email'],
                    'guest_phone' => 'N/A',
                    'check_in_date' => $data['check_in_date'] . ' 14:00:00',
                    'expected_check_out_date' => $data['check_out_date'],
                    'created_by' => $_SESSION['user_id']
                ];
                $booking_id = $this->bookingModel->checkIn($bookingData);
                
                if($booking_id) {
                    $this->roomModel->updateRoomStatus($data['room_id'], 'occupied');
                    $_SESSION['flash_message'] = 'Room booked successfully!';

                    header('Location: index.php?controller=user&action=myBookings');
                } else {
                    die('Something went wrong');
                }
            } else {
                $room = $this->roomModel->getRoomById($data['room_id']);
                require_once 'views/users/book_room.php';
            }
        } else {
            if(!isset($_GET['room_id'])) {
                header('Location: index.php?controller=user&action=dashboard');
                return;
            }
            
            $room_id = $_GET['room_id'];
            $room = $this->roomModel->getRoomById($room_id);
            
            if(!$room || $room['status'] != 'available') {
                $_SESSION['flash_message'] = 'Room is not available for booking';
                header('Location: index.php?controller=user&action=dashboard');
                return;
            }
            $data = [
                'room_id' => $room_id,
                'check_in_date' => date('Y-m-d'),
                'check_out_date' => date('Y-m-d', strtotime('+1 day')),
                'room_id_err' => '',
                'check_in_date_err' => '',
                'check_out_date_err' => ''
            ];
            require_once 'views/users/book_room.php';
        }
    }
    public function myBookings() {
        // Check if user is logged in
        if(!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=user&action=login');
            return;
        }
        
        // Get user's bookings
        $this->db = new Database();
        $this->db->query('SELECT b.*, r.room_number, r.room_type, r.price_per_night 
                          FROM bookings b 
                          JOIN rooms r ON b.room_id = r.id 
                          WHERE b.guest_email = :email 
                          ORDER BY b.check_in_date DESC');
        $this->db->bind(':email', $_SESSION['user_email']);
        $bookings = $this->db->resultSet();
        
        // Load view
        require_once 'views/users/my_bookings.php';
    }
}
?>

