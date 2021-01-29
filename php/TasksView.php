<?php 

require_once('TasksController.php');

$newDataTask = new TasksController();

$readDataTask = $newDataTask->read(1);



$activeTasks = array();
$completedTasks = array();




function getData ($data = ''){


    if (isset($_GET[$data])){

        $data = $_GET[$data];

        return $data;

    }
    
};



if ($_SERVER['REQUEST_METHOD'] == 'GET'){

   

    if (isset($_GET['option'])){

       
        if ($_GET['option'] == 'completed'){
    
            $idTask = getData('id');
    
            $completedTask = array(
                'id_task' => $idTask, 
                'category' => 'Completed'
        
            );


            /* funcion */

    



            /* fin funcion */
    
            $newDataTask->changeCategory($completedTask);
            header('Location: index.php');
        
        } else if ($_GET['option'] == 'active'){
    
            $idTask = getData('id');
    
            $activeTask = array(
                'id_task' => $idTask, 
                'category' => 'Active'
        
            );

    
            $newDataTask->changeCategory($activeTask);

            header('Location: index.php');

        }    else if ($_GET['option'] == 'delete'){
    
            $id_task = getData('id');



    
            $newDataTask->delete($id_task);

            header('Location: index.php');
        }
    }
    
      
   


} else if ($_SERVER['REQUEST_METHOD'] = 'POST' ){



    if (isset($_POST['task'])){

        if($_POST['task'] !== '') {
            
            $task = $_POST['task'];

            $newTaskArray = array(
                'id_task' => 0, 
                'category' => 'Active', 
                'task' => $task, 
                'id_user' => 1
            
            );

        
   

            $newDataTask->create($newTaskArray);
    
            array_push($readDataTask, $newTaskArray);

        }
        header('Location: index.php');
    } 
} 


/* echo "<h2>Todas las tareas</h2>"; */

for($n=0; $n < count($readDataTask); $n++){

    if ($readDataTask[$n]['category'] == 'Active'){
        array_push($activeTasks, $readDataTask[$n]);
    }

    if ($readDataTask[$n]['category'] == 'Completed'){
        array_push($completedTasks, $readDataTask[$n]);
    }

    
} 


/* echo "
<table>

    <tr>
        <th>id_task</th>
        <th>task</th>
        <th>category</th>


    </tr>
";


Este readDataTask Username llega solo cuando selecciono uno de los dos users, si mando '' selecciona todo y no trae username

for($n=0; $n < count($readDataTask); $n++){
    echo "
    <tr>

        <td>".$readDataTask[$n]['id_task']."</td>
        <td>".$readDataTask[$n]['task']."</td>
        <td>".$readDataTask[$n]['category']."</td>
        <td><a href=index.php?option=delete&id=".$readDataTask[$n]['id_task'].">Eliminar</a></td>
        <td><a href=index.php?option=completed&id=".$readDataTask[$n]['id_task'].">Completada</a></td>
        


    
    </tr>";
} 

echo "</table>"; */

echo "<div class= 'category-containers'>";

   

    echo "
    <div class='task-container'>

    ";
    echo "<h2>Activos</h2>";
    for($n = 0; $n < count($activeTasks) ; $n++){

        echo "

            <div class = 'task'>

            <div class = 'active-task'>".$activeTasks[$n]['task']."</div>

            <div class='task-options'>

                <div class='deleted-task'><a href=index.php?option=delete&id=".$activeTasks[$n]['id_task']."><i class='fas fa-lg fa-minus-circle'></i></a></div>
                <div class='completed-task'><a href=index.php?option=completed&id=".$activeTasks[$n]['id_task']."><i class='fas fa-lg fa-check-circle'></i></a></div>

            </div>

            </div>
        
        
        ";

    }

    echo "</div>";



    
    
    
    echo "
    <div class='task-container'>
    
    ";
    
    echo "<h2>Completados</h2>";
    for($n = 0; $n < count($completedTasks) ; $n++){

        echo "
        <div class = 'task'>

            <div class='completed-task'>".$completedTasks[$n]['task']."</div>

            <div class='task-options'>
                <div class='deleted-task'><a href=index.php?option=delete&id=".$completedTasks[$n]['id_task']."><i class='fas fa-lg fa-minus-circle'></i></a></div>
                <div class='active-task'><a href=index.php?option=active&id=".$completedTasks[$n]['id_task']."><i class='fas fa-lg  fa-undo'></i></a></div>
            </div>

        </div>";

    }

    echo "</div>";
echo "</div>";