<?php
include $_SERVER['DOCUMENT_ROOT']."/layout/header.php";

include $_SERVER['DOCUMENT_ROOT']."/db/connector.php";
include $_SERVER['DOCUMENT_ROOT']."/models/base.php";

if(isset($_POST['project_name'])) {
      
      echo "<div class='alert alert-success' role='alert'>
      You have created a project !!
      </div>";  
}


echo '</br> <form action="?action=gesendet" method="post">
      <input type="text" name="project_name">
      <input type="submit" value="Create project">
      </form>';


      if(isset($_POST['project_name'])) {
                  Base::create_project($_POST['project_name']); 
      }



      include $_SERVER['DOCUMENT_ROOT']."/layout/footer.php";

?>