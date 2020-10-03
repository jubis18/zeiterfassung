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
            
            if($row['time'] != NULL) {
                $projects_time_id = $row['projects_time_id'];
                print_r( "Time: ".$row['time'] ."</br>" );
                print_r( "Date: ".$row['date']."</br>" );
                print_r( "Task: ".$row['project_task']."</br>" );
            
                print_r("<div> <a href='?del_task=$projects_time_id'>Delete task </a> </div>");
            }
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

    public static function add_task($id,$time, $date, $task) {
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $sql = "SELECT * FROM projects_time WHERE project_id=$id ";
        $result = mysqli_query($connection, $sql);
        
        while($row = $result->fetch_assoc() ) {
            if($row['time']) {
                $sql = "INSERT INTO projects_time (project_id, time,date,project_task) VALUES ($id, '$time', '$date', '$task') ";
                $result = mysqli_query($connection, $sql);
            break;
            }else {
                $sql = "UPDATE projects_time SET time = '$time', date = '$date', project_task ='$task' WHERE project_id = $id" ;
                $result = mysqli_query($connection, $sql);
            break;
            }
        }
       

        header("Location: /zeiterfassung/index.php");

    }

    public static function delete_task($id) {
        
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $sql = "UPDATE projects_time SET time = NULL, date = NULL, project_task = NULL WHERE projects_time_id = $id";
        $result = mysqli_query($connection, $sql);

        header("Location: /zeiterfassung/index.php");

    }

 

}

?>