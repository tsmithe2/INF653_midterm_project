<?php
    class Database 
    {
        private static $dsn = 'mysql:host=eyw6324oty5fsovx.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=y15ma8233qeiei71'; 
        private static $username = 'a36r0n5p9xrvfqpe'; 
        private static $password = 'puilsn09m55nmfjl'; 
        private static $db;

        private function __construct() {}

        public static function getDB() 
        { 
            if (!isset(self::$db)) 
            { 
                try 
                {
                    self::$db = new PDO(self::$dsn, self::$username, self::$password);
                }  
                catch (PDOException $e) 
                {
                    $error_message = $e->getMessage(); 
                    include('view/database_error.php'); 
                    exit();
                } 
            } 
            return self::$db; 
        }
        
        public static function fetch_all($query, $db)
        {
            $statement = $db->prepare($query); 
            $statement->execute();
            $result = $statement->fetchAll(); 
            $statement->closeCursor();
            return $result;
        }

        public static function fetch_one($query, $db)
        {
            $statement = $db->prepare($query); 
            $statement->execute();
            $result = $statement->fetch(); 
            $statement->closeCursor();
            return $result;
        }
    } 
?>