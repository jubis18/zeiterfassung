<?php
include $_SERVER['DOCUMENT_ROOT']."/db/connector.php";
include $_SERVER['DOCUMENT_ROOT']."/models/base.php";

echo "<a href='/index.php'> Tasks</a>";
echo "<a href='/views/new-project.php'> Create Project</a>";
echo "<a href='/views/projects.php'> Info Projects</a>";

    echo " </br> Update project task: ". $_GET['update_task'];
    $task_id = $_GET['update_task'];
    $result =Base::projectInfoById($task_id);

    

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

    if(isset($_POST['time'], $_POST['date'], $_POST['task'] ) ){
        $id = $_POST['taskid'];
        $time = $_POST['time'];
        $date = $_POST['date'];
        $task = $_POST['task'];
        Base::update_task($id, $time, $date, $task);
    }

    if(isset($_POST['submit'])) {
        
        $id =$_POST['taskid'];
        header("Location: /index.php");
    }
?>