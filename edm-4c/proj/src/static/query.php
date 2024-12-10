<?php
class Query {
    // Login query
    public static function LOGIN_QUERY() {
        return "SELECT * FROM users WHERE username = ? OR email = ?";
    }

    // Register query
    public static function REGISTER_QUERY() {
        return "INSERT INTO users (first_name, last_name,  birthdate, username, password, email, created_at)
                VALUES (:first_name, :last_name,  :birthdate, :username, :password, :email, NOW())";
    }
}
?>
