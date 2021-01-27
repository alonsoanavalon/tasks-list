<?php 

require_once('TasksController.php');

$newDataTask = new TasksController();

$readDataTask = $newDataTask->read(1);

$countDataTask = count($readDataTask);

$activeTasks = array();
$completedTasks = array();
$deletedTasks = array();



echo "<h2>Todas las tareas</h2>";

for($n=0; $n < $countDataTask; $n++){

    if ($readDataTask[$n]['category'] == 'Active'){
        array_push($activeTasks, $readDataTask[$n]);
    }

    if ($readDataTask[$n]['category'] == 'Completed'){
        array_push($completedTasks, $readDataTask[$n]);
    }

    if ($readDataTask[$n]['category'] == 'Deleted'){
        array_push($deletedTasks, $readDataTask[$n]);
    }
    
} 


echo "
<table>

    <tr>
        <th>id_task</th>
        <th>task</th>
        <th>category</th>
        <th>username</th>

    </tr>
";

for($n=0; $n < $countDataTask; $n++){
    echo "
    <tr>

        <td>".$readDataTask[$n]['id_task']."</td>
        <td>".$readDataTask[$n]['task']."</td>
        <td>".$readDataTask[$n]['category']."</td>
        <td>".$readDataTask[$n]['username']."</td>
    
    
    </tr>";
} 

echo "</table>";

echo "<h2>Activos</h2>";

echo "
<table>

    <tr>
        <th>task</th>
        <th>category</th>
    </tr>

";

for($n = 0; $n < count($activeTasks) ; $n++){

    echo "
    <tr>

        <td>".$activeTasks[$n]['task']."</td>
        <td>".$activeTasks[$n]['category']."</td>
    
    
    </tr>";

}

echo "</table>";

echo "<h2>Eliminados</h2>";


echo "
<table>

    <tr>
        <th>task</th>
        <th>category</th>
    </tr>

";

for($n = 0; $n < count($deletedTasks) ; $n++){

    echo "
    <tr>

        <td>".$deletedTasks[$n]['task']."</td>
        <td>".$deletedTasks[$n]['category']."</td>
    
    
    </tr>";

}

echo "</table>";

echo "<h2>Completados</h2>";



echo "
<table>

    <tr>
        <th>task</th>
        <th>category</th>
    </tr>

";

for($n = 0; $n < count($completedTasks) ; $n++){

    echo "
    <tr>

        <td>".$completedTasks[$n]['task']."</td>
        <td>".$completedTasks[$n]['category']."</td>
    
    
    </tr>";

}

echo "</table>";




