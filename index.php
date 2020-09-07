<?php
include("views/new-project.php");
include("db/connector.php");
include("models/base.php");


    if($_POST) {
        echo " </br> <h3> Projekt ". "<u>".$_POST['project_name']."</u>" . " wurde erstellt </h3>";
        $connect = Connector::createConn();
        $pname = $_POST['project_name'];
        $sql = "INSERT INTO projekte (projekt_name) VALUES ('$pname')";
        $result = mysqli_query($connect, $sql);
    }




    


?>