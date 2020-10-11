<?php

class Base {

    public static function allProjects() {

        $db = Connector::getInstance();
        $connection= $db->getConnection(); 
        $sql = "SELECT * FROM projects" ;
        $result = $connection->query($sql); 
        
        return $result;
      
    }

    public static function projectById($id) {  

        $db = Connector::getInstance();
        $connection= $db->getConnection(); 
        $sql = "SELECT project_name FROM projects WHERE project_id = $id";
        $result = $connection->query( $sql);

        $row = $result->fetchArray();
        return $row;
         
    }
    
    public static function projectInfoById($id) {
        $db = Connector::getInstance();
        $connection= $db->getConnection(); 
        $sql = "SELECT * FROM projects_time WHERE projects_time_id = $id";
        $result = $connection->query($sql);

        return $result;
         
    }

    public static function projInfo() {
        
        $db = Connector::getInstance();
        $connection= $db->getConnection(); 
        $sql = "SELECT * FROM projects_time ORDER BY date DESC";
        $result = $connection->query($sql);

        return $result;

    }

    public static function create_project($pname) {
       
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $sql = "INSERT INTO projects (project_name) VALUES ('$pname'); "; 
        $result =$connection->query($sql);

    }

    public static function delete_project($id) {
        
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $sql = "DELETE FROM projects WHERE project_id= $id";
        $result = $connection->query($sql);

        $sql = "DELETE FROM projects_time WHERE project_id=$id";
        $result = $connection->query($sql);

        header("Location: /views/projects.php");

    }

    public static function add_task($id,$time, $date, $task) {
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $sql = "INSERT INTO projects_time (project_id, time,date,project_task) VALUES ($id, '$time', '$date', '$task') ";
        $result = $connection->query($sql);

        header("Location: /index.php");

    }

    public function update_task($id, $time, $date, $task) {
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $sql = "UPDATE projects_time SET time = '$time' , date = '$date' , project_task = '$task' WHERE projects_time_id = $id";
        $result = $connection->query($sql);
    }

    public static function delete_task($id) {
        
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $sql = "DELETE FROM projects_time WHERE projects_time_id=$id";
        $result = $connection->query($sql);

        header("Location: /index.php");

    }

    public static function sum_time($id) {
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $sql = "SELECT project_id, SUM(strftime('%s', time) -
        strftime('%s', '00:00:00'       )) AS totalTime FROM projects_time WHERE project_id=$id";
        $result = $connection->query($sql);
        
        while($row = $result->fetchArray() ) {

            return $row['totalTime'];
    } 
        }

    public static function total_day_time_sum() {
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $sql = "SELECT date, SUM(strftime('%s', time) -
        strftime('%s', '00:00:00'       )) AS 'totaltime' FROM projects_time GROUP BY date ORDER BY date DESC";
        $result = $connection->query($sql); 
        
        while($row = $result->fetchArray() ) {
            $seconds = $row['totaltime'];
            $hours = floor($seconds / 3600);
            $mins = floor($seconds / 60 % 60);
            $secs = floor($seconds % 60);
            $timeFormat = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
            echo  "</br> Total time ". $timeFormat ." ";
            echo "</br>" . $row['date'] . "  ";
        } 
    }
        
    public static function select_projects() {
        
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $sql = "SELECT * FROM projects" ;
        $result = $connection->query($sql);
        $select= '<select name="projects">';
        
        while($row = $result->fetchArray())  {

            $select.='<option value="'.$row['project_id'].'">'.$row['project_name'].'</option>';

        }
        $select.='</select>';
        echo $select;
    }
    
 

}

?>