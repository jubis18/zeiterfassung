<?php
include $_SERVER['DOCUMENT_ROOT']."/db/connector.php";
include $_SERVER['DOCUMENT_ROOT']."/models/base.php";

echo "<a href='/index.php'> Tasks</a>";
echo "<a href='/views/new-project.php'> Create Project</a>";
echo "<a href='/views/projects.php'> Info Projects</a>";


echo '<form action="?action=gesendet" method="post">
      <input type="text" name="project_name">
      <input type="submit" value="Projekt erstellen">
      </form>';


      if(isset($_POST['project_name'])) {
            if(Base::create_project($_POST['project_name']) ) {
                  echo "success";
            };
            
      }





?>