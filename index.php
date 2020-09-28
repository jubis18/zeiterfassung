<?php
//include("views/new-project.php");
include("db/connector.php");
include("models/base.php");
 
echo "<a href='/zeiterfassung/views/new-project.php'> Create Project</a>";

    /*if($_POST) {
        echo " </br> <h3> Projekt ". "<u>".$_POST['project_name']."</u>" . " wurde erstellt </h3>";
        $db = Connector::getInstance();
        $connection = $db->getConnection();
        $pname = $_POST['project_name'];
        $sql = "INSERT INTO projects (project_name) VALUES ('$pname')"; //projekte , projekt_name
        $result = mysqli_query($connection, $sql);
        
    } */

    $result =Base::allProjects();
    
    while($row = $result->fetch_assoc() ) {
            
        print_r( "</br> " . $row["project_name"] . "</br> " );
        $id = $row['project_id'];
        Base::projInfo($id);
        print_r("<form action='?action=update_$id' method='post'>
                <input type='hidden' name='id' value='$id'>
                <input type='time' name='time'>
                <input type='date' name='date'>  
                <input type='text' name='task'>

                <input type='submit' value='project update'>
                </form>");
 
        print_r("<div> <a href='?del=$id'>Delete</a> </div>");

    }



    if(isset($_GET['del'])) {
        Base::delete_project($_GET['del']);
    }



    


?>