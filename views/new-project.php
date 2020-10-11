<?php
include $_SERVER['DOCUMENT_ROOT']."/layout/header.php";

include $_SERVER['DOCUMENT_ROOT']."/db/connector.php";
include $_SERVER['DOCUMENT_ROOT']."/models/base.php";

echo '<form action="?action=gesendet" method="post">
      <input type="text" name="project_name">
      <input type="submit" value="Projekt erstellen">
      </form>';


      if(isset($_POST['project_name'])) {
            if(Base::create_project($_POST['project_name']) ) {
                  echo "success";
            };
            
      }



      include $_SERVER['DOCUMENT_ROOT']."/layout/footer.php";

?>