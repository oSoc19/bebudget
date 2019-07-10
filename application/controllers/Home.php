<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller {

        public function __construct() {
            parent::__construct();

            $this->load->helper('form');
        }

        public function index() {
            $data['titel'] = '';
            $partials = array('hoofding' => 'main_header',
                'nav' => 'main_nav',
                'inhoud' => 'landingpage');
            $this->template->load('main_master', $partials, $data);
        }

        public function index3() {
            $data['titel'] = 'About';

            $this->load->model('expense_model');
            $data['expenses'] = $this->expense_model->getCategories();

            $partials = array('hoofding' => 'main_header',
                'nav' => 'main_nav',
                'inhoud' => 'chart');
            $this->template->load('main_master', $partials, $data);
        }
    }
