<?php
include("db/connector.php");
include("models/base.php");
 
echo "<a href='/zeiterfassung/views/new-project.php'> Create Project</a>";


    $result =Base::allProjects();
    
    while($row = $result->fetch_assoc() ) {
            
        print_r( "</br> <h3>". $row["project_name"] ."</h3> " );
        
        $id = $row['project_id'];
        Base::projInfo($id);
        
        print_r("<form action='?action=update_$id' method='post'>
                <input type='hidden' name='id' value='$id'>
                <input type='time' name='time' value = 00:00>
                <input type='date' name='date'>  
                <input type='text' name='task'>

                <input type='submit' value='project update'>
                </form> ");
                
 
        print_r("<div> <a href='?del=$id'>Delete</a> </div>");

    }



    if(isset($_POST['time'], $_POST['date'], $_POST['task']) ) {
        
        $id =   $_POST['id'];
        $time = $_POST['time'];
        $date = $_POST['date'];
        $task = $_POST['task'];

        Base::add_task($id,$time, $date, $task);
    }
    
    
    
    if(isset($_GET['del'])) {
        Base::delete_project($_GET['del']);
    }

    if(isset($_GET['del_task'])) {
        Base::delete_task($_GET['del_task']);
    }



    


?>