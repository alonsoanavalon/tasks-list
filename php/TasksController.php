<?php

require_once('TasksModel.php');


class TasksController {

    private $tasksModel;

    public function __construct(){
        $this->taskModel = new TaskModel();
    }

    public function create($task_data = array()){
        return $this->taskModel->create($task_data);        
    }
    public function read($task_data = ''){
        return $this->taskModel->read($task_data);
    }
    public function update($task_data = array()){
        return $this->taskModel->update($task_data);
    }
    public function delete($task_data = ''){
        return $this->taskModel->delete($task_data);
    }

    public function changeCategory ($task_data = array()){
        return $this->taskModel->changeCategory($task_data);
    }

}