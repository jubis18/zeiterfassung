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

    Base::all("projects", "project_name");




    


?>