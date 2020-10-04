<?php
include("db/connector.php");
include("models/base.php");
 
echo "<a href='/zeiterfassung/index.php'> Tasks</a>";
echo "<a href='/zeiterfassung/views/new-project.php'> Create Project</a>";
echo "<a href='/zeiterfassung/views/projects.php'> Info Projects</a>";


        Base::projInfo();
       
        print_r("<form action='?action=update' method='post'>
                <input type='date' name='date'>");
                Base::select_projects();

                print_r("<input type='time' name='time' value = 00:00>
                        <input type='text' name='task'>
                        <input type='submit' value='project update'>
                        </form> ");
                
 
        //print_r("<div> <a href='?del=$id'>Delete</a> </div>");
        


    //}     



    if(isset($_POST['time'], $_POST['date'], $_POST['task'], $_POST['projects']) ) {
        
        $id =   $_POST['projects'];
        $time = $_POST['time'];
        $date = $_POST['date'];
        $task = $_POST['task'];

        Base::add_task($id,$time, $date, $task);
    }


    if(isset($_GET['del_task'])) {
        Base::delete_task($_GET['del_task']);
    }



    


?>