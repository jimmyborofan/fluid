<?php

    /**
     * Description of Tasks_Model
     * 
     * A Model to allow the controllers to access Tasks and related data
     * as well as Create, Read, Update and Delete (soft Delete) tasks
     * 
     * THere are also several smaller such as functions that will derive task ID's from the 
     * current url 
     *
     * @author Jim Crawford
     *
     * 
     */
    class Tasks_Model extends CI_Model {

        /**
         * initiate class and call parent COnstructor
         */
        public function __construct() {
            parent::__construct();
        }

        /**
         * 
         * @param type $taskID (OPTIONAL) if no TASK ID is provided, ALL data is sent
         * @return ARRAY - an ARRAY containing data from the task, including 
         * asignee, status and labels
         */
        public function getTaskData($taskID = false) {
            $result = array();
            $this->db->select("task.task_id, task.status as statusId, task.name AS taskname,"
                    . " task.description AS details, task_label.label_id as labelId,"
                    . " CONCAT_WS(' ', user.first_name, user.surname) "
                    . " AS assignee ,user.user_id as userId, task_status.status AS status,"
                    . " task_status.colour AS scolour, labels.name as label, labels.colour as lcolour  ");
            $this->db->from('task');
            $this->db->join('task_user', 'task_user.task_id = task.task_id', 'left');
            $this->db->join('user', 'task_user.user_id = user.user_id', 'left');
            $this->db->join('task_status', 'task_status.task_status_id = task.status', 'left');
            $this->db->join('task_label', 'task_label.task_id = task.task_id', 'left');
            $this->db->join('labels', 'labels.label_id = task_label.label_id', 'left');
            $this->db->where('task.deleted', '0');
            if ($taskID) {
                $this->db->where('task.task_id', $taskID);
            }


            $query = $this->db->get();
            foreach ($query->result_array() as $row) {
                $result[] = $row;
            }
            return $result;
        }

        /**
         * Calls the above GetTaskData method, converts the result to JSON and
         * returns a string
         * @param INT $taskID
         * @return STRING - (AS JSON)
         */
        public function getJSONTaskData($taskID = false) {
            $json = json_encode($this->getTaskData($taskID));
            return $json;
        }

        /**
         * Using the task ID, find the task title from the database
         * @param INT $taskID
         * @return STRING
         */
        public function getTaskTitle($taskID) {
            $this->db->select("task.name");
            $this->db->from('task');
            $this->db->where('task.task_id', $taskID);
            $query = $this->db->get();
            foreach ($query->result_array() as $row) {
                $name = $row['name'];
            }
            return $name;
        }

        /**
         * provide updated data to update the task
         * @param ARRAY $task
         * @return BOOLEAN - yes/no has the task updated?
         */
        public function updateTask($task) {
            $dataAssign = array(
                'user_id' => $task['assignedTo']
            );
            $this->db->where('task_id', $task['taskId']);
            $resultAssign = $this->db->update('task_user', $dataAssign);

            $dataLabel = array(
                'label_id' => $task['label']
            );
            $this->db->where('task_id', $task['taskId']);
            $resultLabel = $this->db->update('task_label', $dataLabel);

            $dataTask = array(
                'name' => $task['taskName'],
                'description' => $task['taskDetails'],
                'status' => $task['status']
            );

            $this->db->where('task_id', $task['taskId']);
            $resultTask = $this->db->update('task', $dataTask);
            return $resultTask;
        }

        /**
         * Set task as Deleted (Soft delete)
         * @param INT $taskID
         */
        public function deleteTask($taskID) {
            $data = array(
                'deleted' => 1
            );
            $this->db->where('task_id', $taskID);
            $resultTask = $this->db->update('task', $data);
            $result['success'] = $resultTask;
            return json_encode($result);
        }

        /**
         * Like te above method, a soft undelete
         * @param INT $taskID
         */
        public function unDeleteTask($taskID) {
            $data = array(
                'deleted' => 0
            );
            $this->db->where('task_id', $taskID);
            $resultTask = $this->db->update('task', $data);
        }

        /**
         * CHange the status of a task, dependent on the status ID sent
         * @param INT $statusID of the status being assigned
         * @param INT $taskID task ID of the task being updated
         */
        public function setTaskStatus($statusID, $taskID) {
            $data = array(
                'status' => $statusID
            );
            $this->db->where('task_id', $taskID);
            $resultTask = $this->db->update('task', $data);
        }

        /**
         * Some functions require the name or ID of a status only
         * @return ARRAY - the data from the status
         */
        public function getStatusData() {
            $this->db->select("task_status_id AS status_id, status");
            $this->db->from('task_status');
            $query = $this->db->get();
            foreach ($query->result_array() as $row) {
                $status[$row['status_id']]['statusId'] = $row['status_id'];
                $status[$row['status_id']]['name'] = $row['status'];
            }
            return $status;
        }

        /**
         * Some functions require ONLY the ID of a status
         * this is simpler than providing the name as well
         * so this method is more efficient when needed
         * @return INT - the ID from the status
         */
        public function getStatusId($taskId) {
            $this->db->select("status");
            $this->db->from('task');
            $this->db->where("task_id =", $taskId);
            $query = $this->db->get();
            foreach ($query->result_array() as $row) {
                $statusId = $row['status'];
            }
            return $statusId;
        }

        /**
         * Some functions require ONLY the ID of a label
         * this is simpler than providing the name as well
         * so this method is more efficient when needed
         * @return INT - the ID from the label
         */
        public function getLabelId($taskId) {
            $this->db->select("label_id");
            $this->db->from('task_label');
            $this->db->where("task_id =", $taskId);
            $query = $this->db->get();
            foreach ($query->result_array() as $row) {
                $labelId = $row['label_id'];
            }
            return $labelId;
        }

        /**
         * Some functions require the name and ID of a label only
         * @return ARRAY - the data from the label details
         */
        public function getLabelData() {
            $this->db->select("label_id, name");
            $this->db->order_by('priority', 'ASC');
            $this->db->from('labels');
            $query = $this->db->get();
            foreach ($query->result_array() as $row) {
                $label[$row['label_id']]['labelId'] = $row['label_id'];
                $label[$row['label_id']]['name'] = $row['name'];
            }

            return $label;
        }

        /**
         * Create a new task
         * @param ARRAY $task an array of data with the task details 
         * of which we will need to split up and store in the respective tables
         */
        public function newTask($task) {

            $data = array(
                'name' => $task['taskName'],
                'description' => $task['taskDetails'],
                'status' => $task['status']
            );
            $this->db->insert('task', $data);

            /**
             * New Task ID
             */
            $taskId = $this->db->insert_id();
            /*
             * Create the assigned User
             */
            $data = array(
                'user_id' => $task['assignedTo'],
                'task_id' => $taskId
            );
            $this->db->insert('task_user', $data);

            /*
             * create the label
             */
            $data = array(
                'label_id' => $task['label'],
                'task_id' => $taskId
            );
            $this->db->insert('task_label', $data);
            return $taskId;
        }

        /**
         * Standard method is to ensure the the taskID
         * (or other ID's) are always the third parameter
         * so that the system can get these details correctly
         * @return MIXED (INT if found or BOOLEAN FALSE if not)
         */
        public function geturlTaskID() {
            if ($this->uri->segment(3) === FALSE) {
                $taskId = false;
            } else {
                $taskId = $this->uri->segment(3);
            }
            return $taskId;
        }

    }
    