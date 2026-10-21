<?php

class Auth
{
    public $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    public static function requireLogin()
    {
        if (!self::isLoggedIn()) {
            header("Location: " . BASE_URL . "/pages/auth/auth-login");
            exit();
        }
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
        return true;
    }

    public function fetchUser($user_id)
    {
        try {
            $sql = "SELECT usr_id, username, email, password, userRole FROM users WHERE usr_id = ? LIMIT 1";

            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $user_id);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result && $result->num_rows === 1) {
                return $result->fetch_assoc();
            }

            return null;
        } catch (Exception $e) {
            return null;
        }
    }

    public function registerAccount($data)
    {
        // Check for duplicate email
        $checkEmail = $this->conn->prepare("SELECT usr_id FROM users WHERE email = ?");
        $checkEmail->bind_param("s", $data['email']);
        $checkEmail->execute();
        $checkEmail->store_result();
        if ($checkEmail->num_rows > 0) {
            return ["success" => false, "message" => "Email already registered."];
        } else {
            $checkEmail->close();
            // Generate unique user ID
            // Insert new user
            $stmt = $this->conn->prepare("INSERT INTO users (usr_id, username, email, userRole, password, reset_token, date_created) VALUES (?, ?, ?, ?, ?, ?, NOW())");
            $stmt->bind_param("ssssss", $data['user_id'], $data['username'], $data['email'], $data['userRole'], $data['password'], $data['reset_token']);

            if ($stmt->execute()) {
                return ["success" => true];
            } else {
                return ["success" => false, "message" => "Database error: " . $stmt->error];
            }
        }
    }

    public function authenticate($data)
    {
        try {
            // Prepare statement
            $stmt = $this->conn->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
            $stmt->bind_param("s", $data['email']);
            $stmt->execute();

            $result = $stmt->get_result();
            // print_r($result);

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();
                // Verify password
                if (password_verify($data['password'], $user['password'])) {

                    $_SESSION["isLoggedin"] = true;
                    $_SESSION["user_id"] = $user['usr_id'];
                    $_SESSION["username"] = $user['username'];
                    $stmt->close();
                    return true;
                } else {
                    $stmt->close();
                    return false;
                }
            } else {
                $stmt->close();
                return false;
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
}
