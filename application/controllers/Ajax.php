<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Ajax extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model("tasks_model", "tasks");
        }

        /**
         * Default Method, 
         * 
         * if someone tries to load the Ajax page a 404 s returned
         */
        public function index() {
            $this->load->view("templates/header");
            $this->load->view("errors/html/error_404");
            $this->load->view("templates/footer");
        }

        /**
         * Save task data is sent to Model, saved 
         * then the newly saved data is reloaded into the page
         */
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

        /**
         * New task data is stored in the database
         * 
         * This is posted data, though the json is returned
         * the default at the moment is a page reload
         * @todo inject new data into data table and reload via the front end
         * to save time
         */
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

        /**
         * Get data linked to a given task id and display it as a 
         * JSON encoded string
         */

        public function getJSONTask() {
            $taskId = $this->input->post('taskId');
            $json = $this->tasks->getJSONTaskData($taskId);
            echo $json;
            die();
        }

        /**
         * Some front end values require the Label ID
         * thie method displays the label ID linked to a task via its
         * ID
         * @param INT $taskId
         */
        public function getLabelId($taskId) {
            $labelData = $this->task->getLabelId($taskID);
            echo $labelData['label_id'];
            die();
        }

        /**
         * Soft delete a task ID to close, or change the status with a different
         * method
         */
        public function deleteTask() {
            $taskId = $this->input->post('taskId');
            $result = $this->tasks->deleteTask($taskId);
            echo $result;
            die();
        }

    }
