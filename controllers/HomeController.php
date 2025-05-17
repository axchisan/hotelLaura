<?php
class HomeController {
    private $userModel;
    private $roomModel;
    
    public function __construct() {
        $this->userModel = new User();
        $this->roomModel = new Room();
    }
    
    public function index() {
        if(isset($_SESSION['user_id'])) {
            $user = $this->userModel->getUserById($_SESSION['user_id']);
            
            if($user['role'] == 'receptionist') {
                header('Location: index.php?controller=receptionist&action=dashboard');
            } else {
                header('Location: index.php?controller=user&action=dashboard');
            }
        } else {
            require_once 'views/home/index.php';
        }
    }
    public function about() {
        require_once 'views/home/about.php';
    }
    
    public function contact() {
        require_once 'views/home/contact.php';
    }
}
?>

