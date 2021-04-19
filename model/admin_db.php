<?php
    class AdminDB
    {
        session_start();

        private function __construct() {}

        public static function add_admin($username, $password) 
        { 
            $db = Database::getDB();
            $hash = password_hash($password, PASSWORD_DEFAULT); 
            $query = 'INSERT INTO administrators (username, password) VALUES (:username, :password)'; 
            $statement = $db->prepare($query); 
            $statement->bindValue(':username', $username); 
            $statement->bindValue(':password', $hash); 
            $statement->execute(); 
            $statement->closeCursor();
        }

        public static function is_valid_admin_login($username, $password) 
        { 
            $db = Database::getDB();
            $query = 'SELECT password FROM administrators WHERE username = :username'; 
            $statement = $db->prepare($query); 
            $statement->bindValue(':username', $username); 
            $statement->execute(); 
            $row = $statement->fetch(); 
            $statement->closeCursor();
            if (!empty($row["password"]))
            {
                $hash = $row['password'];
            }
            return password_verify($password, $hash); 
        }

        public static function username_exists($username)
        {
            $db = Database::getDB();
            $query = "SELECT username FROM administrators WHERE username = '" . $username . "'";
            $result = fetch_one($query, $db);

            if ($result["username"] == $username && $username != "")
            {
                $_SESSION["username"] = $username;
                return true;
            }
            return false;
        }
    }
?>