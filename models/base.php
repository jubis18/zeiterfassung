<?php

class Base {

    public static function all($table_name, $table_row) {

        $db = Connector::getInstance();
        $connection= $db->getConnection(); 
        $sql = "SELECT * FROM ".$table_name ; //projekte
        $result = mysqli_query($connection, $sql);
        
        while($row = $result->fetch_assoc() ) {
            
            print_r( "</br> " .  $row["$table_row"] ); //projekt_name    
        }
        $connection->close();

    }

    public static function create_project() {
       
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $pname = $_POST['project_name'];
        $sql = "INSERT INTO projects (project_name) VALUES ('$pname') "; //projekte , projekt_name
        $result = mysqli_query($connection, $sql);

        $lastId = mysqli_insert_id($connection);
        $time_foreign_id = "INSERT INTO projects_time (project_id) VALUES ('$lastId')";
        $result = mysqli_query($connection, $pFork);
        
        if(isset($_POST['project_name'])) {
            
            //header("Location: /zeiterfassung/index.php");
        }
        else {
            echo "<h2> Error on DB </h2>";
        }

        $connection->close();
    }

    public static function create_time() {
        
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        
    }

    function delete_project($project_id) {
       
    }

}

?>