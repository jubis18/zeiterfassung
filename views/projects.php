<?php
include $_SERVER['DOCUMENT_ROOT']."/zeiterfassung/db/connector.php";
include $_SERVER['DOCUMENT_ROOT']."/zeiterfassung/models/base.php";

echo "<a href='/zeiterfassung/index.php'> Tasks</a>";
echo "<a href='/zeiterfassung/views/new-project.php'> Create Project</a>";
echo "<a href='/zeiterfassung/views/projects.php'> Info Projects</a>";

$result =Base::allProjects();

while($row = $result->fetch_assoc() ) {
        $id = $row['project_id'];
        $pname= $row['project_name'];
        $seconds = Base::sum_time($id);
        $hours = floor($seconds / 3600);
        $mins = floor($seconds / 60 % 60);
        $secs = floor($seconds % 60);
        $timeFormat = sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
        echo  "</br> Total time <b>$pname </b>: ". $timeFormat ."</br>";
}

$allProjects = Base::allProjects();

while($row = $allProjects->fetch_assoc() ) {
    $id = $row['project_id'];
    $pname = $row['project_name'];
    print_r("</br> <div> <a href='?del=$id'>Delete $pname</a> </div>");

}

if(isset($_GET['del'])) {
    Base::delete_project($_GET['del']);
}


?>