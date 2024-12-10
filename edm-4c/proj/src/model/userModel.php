<?php
class userModel {
    private $con;

    public function __construct($con) {
        $this->con = $con;
    }

    public function login($identifier) {
        $query = Query::LOGIN_QUERY();
        $stmt = $this->con->prepare($query);
        $stmt->execute([$identifier, $identifier]);

        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
 
    public function register($firstName, $lastName, $birthdate, $username, $password, $email) {
        // Updated query without middle_name field
        $query = "INSERT INTO users (first_name, last_name, birthdate, username, password, email) 
                 VALUES (:first_name, :last_name, :birthdate, :username, :password, :email)";
                 
        $stmt = $this->con->prepare($query);

        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);

        try {
            if ($stmt->execute()) {
                return "Registration successful";
            } else {
                return "Registration failed: " . $stmt->errorInfo()[2];
            }
        } catch (PDOException $e) {
            return "Registration failed: " . $e->getMessage();
        }
    }
}
?>