<?php
include $_SERVER['DOCUMENT_ROOT']."/layout/header.php";

include $_SERVER['DOCUMENT_ROOT']."/db/connector.php";
include $_SERVER['DOCUMENT_ROOT']."/models/base.php";

$result =Base::allProjects();

while($row = $result->fetchArray() ) {
         $id = $row['project_id'];
         $pname= $row['project_name'];
         
         $seconds = Base::sum_time($id);
          $hours = floor($seconds / 3600);
          $mins = floor($seconds / 60 % 60);
          
          $timeFormat = sprintf('%02d:%02d', $hours, $mins,);
          echo  "</br> Total time <b>$pname </b>: ". $timeFormat ."</br>";
       
}

 $allProjects = Base::allProjects();

 while($row = $result->fetchArray() ) {
     $id = $row['project_id'];
     $pname = $row['project_name'];
     print_r("</br> <div> <a href='?del=$id'>Delete $pname</a> </div>");

 }
 Base::total_day_time_sum();

 if(isset($_GET['del'])) {
     Base::delete_project($_GET['del']);
 }


 include $_SERVER['DOCUMENT_ROOT']."/layout/footer.php";
?>