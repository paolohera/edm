<?php
class userController {
    
    public function user_login($identifier, $password) {
        $db = new Database();
        $con = $db->initDatabase();
        $model = new userModel($con);

        $userData = $model->login($identifier);

        if ($userData && password_verify($password, $userData['password'])) {
            session_start();
            $_SESSION['username'] = $userData['username'];
            return "Login successful";
        } else {
            return "Invalid username or password";  
        }
    }

    public function user_register($data) {
        $db = new Database();
        $con = $db->initDatabase();
        $model = new userModel($con);

        // Updated required fields without middle_name
        $requiredFields = ['first_name', 'last_name', 'birthdate', 'username', 'password', 'email'];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                return "Error: $field is required.";
            }
        }

        // Sanitize inputs
        $firstName = htmlspecialchars($data['first_name']);
        $lastName = htmlspecialchars($data['last_name']);
        $birthdate = htmlspecialchars($data['birthdate']);
        $username = htmlspecialchars($data['username']);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL);

        // Call the model's register function without middle_name
        return $model->register($firstName, $lastName, $birthdate, $username, $password, $email);
    }

    public function user_logout() {
        session_start();
        session_unset();
        session_destroy();
        return "Logout successful";
    }
}
?>