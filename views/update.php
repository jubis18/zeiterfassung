<?php
include $_SERVER['DOCUMENT_ROOT'].'/layout/header.php';

include $_SERVER['DOCUMENT_ROOT']."/db/connector.php";
include $_SERVER['DOCUMENT_ROOT']."/models/base.php";

echo " </br> Update project task: ". $_GET['update_task'];
$task_id = $_GET['update_task'];
$result =Base::projectInfoById($task_id);

if(isset($_POST['submit'])) {
        
    ?>
    
    <div class="alert alert-success" role="alert">
    You have updated the task !!
    </div>

<?php

$task_id = $_POST['taskid'];
$task = $_POST['task'];
$time = $_POST['time'];
$date = $_POST['date'];


print_r("<form action='' method='post' >
<input type='hidden' name = 'taskid' value ='$task_id'>
<input type='text' name = 'task' value='$task'>
<input type = 'time' name ='time' value = '$time'>
<input type = 'date' name = 'date' value = '$date' >
<input type = 'submit' name='submit' value = 'update'>
    </form>");

} else {
    
    while($row = $result->fetchArray() ) {
        $task = $row['project_task'];
        $time = $row['time'];
        $date = $row['date'];
        print_r("<form action='' method='post' >
                <input type='hidden' name = 'taskid' value ='$task_id'>
                <input type='text' name = 'task' value='$task'>
                <input type = 'time' name ='time' value = '$time'>
                <input type = 'date' name = 'date' value = '$date' >
                <input type = 'submit' name='submit' value = 'update'>
                    </form>");
        
        
    }
}


    if(isset($_POST['time'], $_POST['date'], $_POST['task'] ) ){
        $id = $_POST['taskid'];
        $time = $_POST['time'];
        $date = $_POST['date'];
        $task = $_POST['task'];
        Base::update_task($id, $time, $date, $task);
    }



    include $_SERVER['DOCUMENT_ROOT'].'/layout/footer.php';
?>