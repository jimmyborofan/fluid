<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Page extends CI_Controller {

        /**
         * constructor, call parent constructor to initialise class correctly
         */
        public function __construct() {
            parent::__construct();
            $this->load->model("tasks_model", "tasks");
            $this->load->model("users_model", "users");
        }

        /**
         * This is the default page vew
         * (as set in the config files)
         * the default view is a list of tasks
         */
        public function index() {
            $taskID = $this->tasks->geturlTaskID();
            /*
             * Get task data ready to display in table
             */
            $page['title'] = "All tasks and assigned Users";
            $page['data']['table'] = $this->tasks->getTaskData();
            $usernames = $this->users->getUserData();
            $status = $this->tasks->getStatusData();
            $labels = $this->tasks->getLabelData();

            $page['form']['users'] = $usernames;
            $page['form']['status'] = $status;
            $page['form']['labels'] = $labels;

            $page['view'] = 'taskTable';
            $this->load->view('templates/header', $page);
            $this->load->view($page['view'], $page);
            $this->load->view('templates/editModal', $page);
            $this->load->view('templates/createModal', $page);
            $this->load->view('templates/deleteModal', $page);
            $this->load->view('templates/footer', $page);
        }

        /**
         * If the user clicks on a task name in the main view
         * the details are displayed in full on a single page
         * granted, the template could do with updating
         */
        public function showTask() {
            $taskID = $this->tasks->geturlTaskID();
            /*
             * Get task data ready to display in table
             */
            $page['title'] = $this->tasks->getTaskTitle($taskID);
            $task = $this->tasks->getTaskData($taskID);
            $page['data'] = $task[0];
            $page['view'] = 'showTask';
            $this->load->view('templates/header', $page);
            $this->load->view($page['view'], $page);
            $this->load->view('templates/footer', $page);
        }

    }
