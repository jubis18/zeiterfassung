<?php

class Base {

    public static function allProjects() {

        $db = Connector::getInstance();
        $connection= $db->getConnection(); 
        $sql = "SELECT * FROM projects" ;
        $result = mysqli_query($connection, $sql);
        
        return $result;
      
    }

    public static function projInfo($id) {
        
        $db = Connector::getInstance();
        $connection= $db->getConnection(); 
        $sql = "SELECT * FROM projects_time WHERE project_id=$id";
        $result = mysqli_query($connection, $sql);

        while($row = $result->fetch_assoc() ) {
            print_r( "Time: ".$_POST['time'] );
            print_r( "Date: ".$_POST['date'] );
            print_r( "Task: ".$_POST['project_task'] );
        }

    }

    public static function create_project() {
       
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $pname = $_POST['project_name'];
        $sql = "INSERT INTO projects (project_name) VALUES ('$pname') "; 
        $result = mysqli_query($connection, $sql);

        $lastId = mysqli_insert_id($connection);
        $time_foreign_id = "INSERT INTO projects_time (project_id) VALUES ('$lastId')";
        $result = mysqli_query($connection, $time_foreign_id);

    }

    public static function delete_project($id) {
        
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $sql = "DELETE FROM projects WHERE project_id= $id";
        $result = mysqli_query($connection, $sql);

        $sql = "DELETE FROM projects_time WHERE project_id=$id";
        $result = mysqli_query($connection, $sql);

        header("Location: /zeiterfassung/index.php");

    }

    public static function update($table_name) {
        //$db = Connector::getInstance();
       // $connection = $db->getConnection();
    }

 

}

?>