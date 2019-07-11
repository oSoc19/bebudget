<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller {

        public function __construct() {
            parent::__construct();

            $this->load->helper('form');
        }

        public function index() {
            $this->load->model('quiz_model');
            $questions = $this->quiz_model->generateQuestions();

            $data['titel'] = '';
            $data['questions'] = $questions;

            $partials = array(
                'nav' => 'main_nav',
                'landingspage' => 'landingpage',
                'quiz' => 'quiz_view',
                'graph' => 'chart');
            $this->template->load('main_master', $partials, $data);
        }

        public function index3() {
            $data['titel'] = 'About';

            $this->load->model('expense_model');
            $data['expenses'] = $this->expense_model->getCategories();

            $partials = array(
                'landingpage' => 'landingpage',
                'quiz' => 'quiz');
            $this->template->load('main_master', $partials, $data);
        }
    }
