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
     //print_r("</br> <div> <a href='?del=$id'>Delete $pname</a> </div>");
     ?> <div style= "margin:10px 0px 10px 0px">
                <div class = "icon_delete"> <a href='?del=<?php echo $id?>'><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg> </a> <?php echo $pname ?> </div>
        </div>
<?php
 }
 Base::total_day_time_sum();

 if(isset($_GET['del'])) {
     Base::delete_project($_GET['del']);
 }


 include $_SERVER['DOCUMENT_ROOT']."/layout/footer.php";
?>