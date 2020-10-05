<?php
include $_SERVER['DOCUMENT_ROOT']."/zeiterfassung/db/connector.php";
include $_SERVER['DOCUMENT_ROOT']."/zeiterfassung/models/base.php";

echo "<a href='/zeiterfassung/index.php'> Tasks</a>";
echo "<a href='/zeiterfassung/views/new-project.php'> Create Project</a>";
echo "<a href='/zeiterfassung/views/projects.php'> Info Projects</a>";

    echo " </br> Update project task: ". $_GET['update_task'];
?>