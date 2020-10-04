<?php

class Base {

    public static function allProjects() {

        $db = Connector::getInstance();
        $connection= $db->getConnection(); 
        $sql = "SELECT * FROM projects" ;
        $result = mysqli_query($connection, $sql);
        
        return $result;
      
    }

    public static function projectById($id) {
        $db = Connector::getInstance();
        $connection= $db->getConnection(); 
        $sql = "SELECT project_name FROM projects WHERE project_id = $id";
        $result = mysqli_query($connection, $sql);

        $row = $result->fetch_assoc();
        return $row;
         
    }

    public static function projInfo() {
        
        $db = Connector::getInstance();
        $connection= $db->getConnection(); 
        $sql = "SELECT * FROM projects_time ORDER BY date DESC";
        $result = mysqli_query($connection, $sql);

        while($row = $result->fetch_assoc() ) {
            
            if($row['projects_time_id'] != NULL) {
                
                $projects_time_id = $row['projects_time_id'];
                $project_id = $row['project_id'];
                print_r( "</br> Time: ".$row['time'] ."</br>" );
                print_r( "Date: ".$row['date']."</br>" );
                print_r( "Task: ".$row['project_task']."</br>" );
                
                $pname =Base::projectById($project_id);
                $pname = $pname['project_name'];
                print_r("Project: <b> $pname </b>");
                
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

    }

    public static function delete_project($id) {
        
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $sql = "DELETE FROM projects WHERE project_id= $id";
        $result = mysqli_query($connection, $sql);

        $sql = "DELETE FROM projects_time WHERE project_id=$id";
        $result = mysqli_query($connection, $sql);

        header("Location: /zeiterfassung/views/projects.php");

    }

    public static function add_task($id,$time, $date, $task) {
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $sql = "INSERT INTO projects_time (project_id, time,date,project_task) VALUES ($id, '$time', '$date', '$task') ";
        $result = mysqli_query($connection, $sql);

        header("Location: /zeiterfassung/index.php");

    }

    public static function delete_task($id) {
        
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $sql = "DELETE FROM projects_time WHERE projects_time_id=$id";
        $result = mysqli_query($connection, $sql);

        header("Location: /zeiterfassung/index.php");

    }

    public static function sum_time($id) {
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $sql = "SELECT project_id, SUM(TIME_TO_SEC(time)) AS totalTime FROM projects_time WHERE project_id=$id";
        $result = mysqli_query($connection, $sql);
        
        while($row = $result->fetch_assoc() ) {

            return $row['totalTime'];
    } 
        }
        
    public static function select_projects() {
        
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $sql = "SELECT * FROM projects" ;
        $result = mysqli_query($connection, $sql);
        $select= '<select name="projects">';
        
        while($row = $result->fetch_assoc())  {

            $select.='<option value="'.$row['project_id'].'">'.$row['project_name'].'</option>';

        }
        $select.='</select>';
        echo $select;
    }
    
 

}

?>