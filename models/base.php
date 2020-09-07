<?php

class Base {

    public static function all() {

        $connector = Connector::createConn();

        $sql = "SELECT * FROM projekte" ;
        $result = mysqli_query($connector, $sql);
        
        while($row = $result->fetch_assoc() ) {
            
            print_r( "</br> " .  $row['projekt_name'] );
            
        }

        
    }
 

}

?>