<?php
    class Database{
        public static function connect(){
            $host = 'localhost';
            $user = 'root';
            $password = '';
            $database = 'USERS';

            $conn = new mysqli($host, $user, $password, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            return $conn;
        }
    }
?>