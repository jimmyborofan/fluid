<?php

    /**
     * Description of Users_Model
     *
     * A Model to allow the controllers to access Users and related data
     *
     * @author Jim Crawford
     */
    class Users_Model extends CI_Model {

        public function __construct() {
            parent::__construct();
        }

        /**
         *
         * @param type $userID (OPTIONAL) if no USER ID is provided, ALL data is sent
         * @return ARRAY - aAN ARRAY containing data from the task, including assignee, status and labels
         */
        public function getUserData($userID = false) {
            $result = array();
            $this->db->select(" user.first_name, user.surname , user.user_id ");
            $this->db->from('user');
            if ($userID) {
                $this->db->where('task.task_id', $userID);
            }
            $query = $this->db->get();
            foreach ($query->result_array() as $row) {
                $result[$row['user_id']]['userId'] = $row['user_id'];
                $result[$row['user_id']]['username'] = $row['first_name'] . " " . $row['surname'];
            }
            return $result;
        }

        /*
         * Return same data as getUserData but placed into a JSON String
         */

        public function getJSONUserData($userID = false) {
            $json = json_encode($this->getTaskData($userID));
            return $json;
        }

        /*
         * Get the full name of user as opposed to get USERNAME of user
         */

        public function getUsersName($userID) {
            $this->db->select(" user.first_name, user.surname");
            $this->db->from('user');
            $this->db->where('user.user_id', $userID);
            $query = $this->db->get();
            foreach ($query->result_array() as $row) {
                $name = $row['first_name'] . " " . $row['surname'];
            }
            return $name;
        }

        /**
         * return linited data about user
         * @param INT $userID the ID of the user being queried
         * @return STRING
         */
        public function getUsername($userID) {
            $this->db->select(" user.username");
            $this->db->from('user');
            $this->db->where('user.user_id', $userID);
            $query = $this->db->get();
            foreach ($query->result_array() as $row) {
                $name = $row['username'];
            }
            return $name;
        }

    }
