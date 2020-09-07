<?php

class Connector {
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "root";
    private static $dbname = "zeiterfassung";
    private static $conn;

// Create connection
    public static function createConn() {
        static::$conn = new mysqli( static::$servername, static::$username, static::$password, static::$dbname);
        

// Check connection
        if (!static::$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            echo " </br> Projekt erstellt";
           }

           return static::$conn;

    }

    
}
?>