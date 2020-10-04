<?php
include $_SERVER['DOCUMENT_ROOT']."/zeiterfassung/db/connector.php";
include $_SERVER['DOCUMENT_ROOT']."/zeiterfassung/models/base.php";

echo "<a href='/zeiterfassung/index.php'> Tasks</a>";
echo "<a href='/zeiterfassung/views/new-project.php'> Create Project</a>";
echo "<a href='/zeiterfassung/views/projects.php'> Info Projects</a>";


echo '<form action="?action=gesendet" method="post">
      <input type="text" name="project_name">
      <input type="submit" value="Projekt erstellen">
      </form>';


      if(isset($_POST['project_name'])) {
            Base::create_project($_POST['project_name']);
            
      }





?>