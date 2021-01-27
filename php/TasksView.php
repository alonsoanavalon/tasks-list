<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="TasksView.php" method="POST">

        <label for="task">New Task : </label>
        <input type="text" name="task" id="task" required>
        <input type="submit" value="Ingresar" id="submitTask">

    </form>
    

    <script src="../js/main.js" type="module"></script>
</body>
</html>





<?php 




require_once('TasksController.php');

$newDataTask = new TasksController();

$readDataTask = $newDataTask->read(1);

$countDataTask = count($readDataTask);

$activeTasks = array();
$completedTasks = array();
$deletedTasks = array();


function getData ($data = ''){


    if (isset($_GET[$data])){

        $data = $_GET[$data];

        return $data;

    }
    
};


if ($_SERVER['REQUEST_METHOD'] == 'GET'){

    if (isset($_GET['option'])){

        if ($_GET['option'] == 'delete') {
            
            $idTask = getData('id');
    
            $deletedTask = array(
                'id_task' => $idTask,
                'category' => 'Deleted'
            );
    
            $newDataTask->changeCategory($deletedTask);
    
        } else if ($_GET['option'] == 'completed'){
    
            $idTask = getData('id');
    
            $completedTask = array(
                'id_task' => $idTask, 
                'category' => 'Completed'
        
            );
    
            $newDataTask->changeCategory($completedTask);
    
        
        } else if ($_GET['option'] == 'destroy'){
    
            $idTask = getData('id');
    
            var_dump($idTask);
    
            $newDataTask->delete($idTask);
    
        } 
    }



} else if ($_SERVER['REQUEST_METHOD'] = 'POST' ){



    if (isset($_POST['task'])){

        $task = $_POST['task'];

        $newTaskArray = array(
            'id_task' => 0, 
            'category' => 'Active', 
            'task' => $task, 
            'id_user' => 1
        
        );

        
        $newDataTask->create($newTaskArray);

    }

}




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
        <td><a href=index.php?option=delete&id=".$readDataTask[$n]['id_task'].">Eliminar</a></td>
        <td><a href=index.php?option=completed&id=".$readDataTask[$n]['id_task'].">Completada</a></td>
    
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
        <td><a href=index.php?option=destroy&id=".$deletedTasks[$n]['id_task'].">Destruir</a></td>
    
    
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




