<?php
class ErrorController {
    public function notFound() {
        http_response_code(404);
  
        require_once 'views/errors/404.php';
    }
    
    public function serverError() {
        http_response_code(500);
        require_once 'views/errors/500.php';
    }
}
?>

