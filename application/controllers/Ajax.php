    <?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Ajax extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model("tasks_model", "tasks");
        }

        public function index() {
            $this->load->view("templates/header");
            $this->load->view("hello");
            $this->load->view("templates/footer");
        }

        public function saveTask() {
            $task['taskId'] = $this->input->post('taskId');
            $task['assignedTo'] = $this->input->post('assignedTo');
            $task['taskName'] = $this->input->post('taskName');
            $task['taskDetails'] = $this->input->post('taskDetails');
            $task['label'] = $this->input->post('label');
            $task['status'] = $this->input->post('status');
            $this->tasks->updateTask($task);

            /*
             * This MUST be the last call, it is collecting
             * NEW data, do not remove before the echo statement
             */
            $json = $this->tasks->getJSONTaskData($task['taskId']);
            echo $json;
            die();
        }
     public function newTask() {
            $task['assignedTo'] = $this->input->post('assignedTo');
            $task['taskName'] = $this->input->post('taskName');
            $task['taskDetails'] = $this->input->post('taskDetails');
            $task['label'] = $this->input->post('label');
            $task['status'] = $this->input->post('status');
            $taskID = $this->tasks->newTask($task);
            $json = $this->tasks->getJSONTaskData($task['taskId']);
            echo $json;
            die();
        }

        public function getTask() {
            $page['data'] = $this->tasks->getTaskData($taskId);
            $page['title'] = "Debug Data";
            $this->load->view("templates/header", $page);
            $this->load->view("debug", $page);
            $this->load->view("templates/footer");
        }

        public function getJSONTask() {
            $taskId = $this->input->post('taskId');
            $json = $this->tasks->getJSONTaskData($taskId);
            echo $json;
            die();
        }

        public function getLabelId ($taskId) {
           $labelData = $this->task->getLabelId($taskID);
           echo $labelData['label_id'];
           die();
        }
        public function getStatusId ($taskId) {

        }

        public function deleteTask() {
            $taskId =  $this->input->post('taskId');
            $result = $this->tasks->deleteTask($taskId);
            echo $result;
            die();
        }

    }
