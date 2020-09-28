<?php
 include $_SERVER['DOCUMENT_ROOT']."/zeiterfassung/db/connector.php";
 include $_SERVER['DOCUMENT_ROOT']."/zeiterfassung/models/base.php";

 echo "<a href='/zeiterfassung/index.php'> zurück</a>";
echo '<form action="?action=gesendet" method="post">
      <input type="text" name="project_name">
      <input type="submit" value="Projekt erstellen">
      </form>';

/*echo '<form action="" method="POST">
<input type="submit" value="0" name="mybutton">
<input type="submit" value="1" name="mybutton">
<input type="submit" value="2" name="mybutton">
</form>'; */


      if(isset($_POST['project_name'])) {
            Base::create_project();
            
      }





?>