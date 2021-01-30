<?php

require_once('Model.php');

class TaskModel extends Model {

    private $id_task;
    private $id_user;
    private $category;
    private $task;

    public function __construct(){
        $this->db_name = 'tasklist';
    }

    public function create($task_data = array()){

        foreach($task_data as $key => $value) {
            $$key = $value;
        }

        $this->query = "INSERT INTO tasks (id_task, category, task, id_user) VALUES ($id_task, '$category', '$task', '$id_user')";



        $this->set_data();

   
        
    }
    public function read($task_data = ''){

        $this->query = ($task_data != '')
        ? "SELECT t1.id_task, t1.task, t1.category, t2.username FROM tasks AS t1 INNER JOIN users AS t2 ON t1.id_user = t2.id_user WHERE t1.id_user = $task_data"
        : "SELECT * FROM tasks";



        $this->get_data();

        $data = array();

        foreach($this->rows as $key => $value){
            array_push($data, $value);
        }

        return $data;
        
    }
    public function update($task_data = array()){

        foreach($task_data as $key => $value) {
            $$key = $value;
        }

        $this->query = "UPDATE tasks SET id_task = $id_task, category = '$category', task = '$task', id_user = '$id_user' WHERE id_task = $id_task";

        $this->set_data();
        
    }
    public function delete($task_data = ''){

        $this->query = "DELETE FROM tasks WHERE id_task = $task_data";

        $this->set_data();
        
    }

    public function changeCategory($task_data = array()){
        foreach($task_data as $key => $value){
            $$key = $value;
        }

        $this->query = "UPDATE tasks SET category = '$category' WHERE id_task = $id_task";



        $this->set_data();


    }



}