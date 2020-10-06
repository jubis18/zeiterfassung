<?php
include("db/connector.php");
include("models/base.php");
 
echo "<a href='/zeiterfassung/index.php'> Tasks</a>";
echo "<a href='/zeiterfassung/views/new-project.php'> Create Project</a>";
echo "<a href='/zeiterfassung/views/projects.php'> Info Projects</a>";


        $result = Base::projInfo();

        if(isset($_GET['del_task'])) {
            Base::delete_task($_GET['del_task']);
        }

        while($row = $result->fetch_assoc() ) {
            
            if($row['projects_time_id'] != NULL) {
                
                $projects_time_id = $row['projects_time_id'];
                $project_id = $row['project_id'];
                print_r( "</br> Time: ".$row['time'] ."</br>" );
                print_r( "Date: ".$row['date']."</br>" );
                print_r( "Task: ".$row['project_task']."</br>" );
                
                $pname =Base::projectById($project_id);
                $pname = $pname['project_name'];
                print_r("Project: <b> $pname </b>");
                
                print_r("<div> <a href='?del_task=$projects_time_id'>Delete task </a> </div>");
                print_r("<div> <a href='views/update.php?update_task=$projects_time_id'>Update </a> </div>");

            }
        }
       
        print_r("<form action='?action=update' method='post'>
                <input type='date' name='date'>");
                Base::select_projects();

                print_r("<input type='time' name='time' value = 00:00>
                        <input type='text' name='task'>
                        <input type='submit' value='project update'>
                        </form> ");


    if(isset($_POST['time'], $_POST['date'], $_POST['task'], $_POST['projects']) ) {
        
        $id =   $_POST['projects'];
        $time = $_POST['time'];
        $date = $_POST['date'];
        $task = $_POST['task'];

        Base::add_task($id,$time, $date, $task);
    }


   



    


?>