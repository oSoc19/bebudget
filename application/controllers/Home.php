<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller {

        public function __construct() {
            parent::__construct();

            $this->load->helper('form');
            $this->lang->load("translation","english");
            $this->lang->load("translation","dutch");
            $this->lang->load("translation","french");

        }

        public function index() {
            $this->load->model('quiz_model');
            $questions = $this->quiz_model->generateQuestions();

            $data['title'] = $this->lang->line("landingpage_title");
            $data['btn_quiz'] = $this->lang->line("landingpage_btn_quiz");
            $data['btn_chart'] = $this->lang->line("landingpage_btn_chart");

            $data['questions'] = $questions;

            $partials = array(
                'landingspage' => 'landingpage',
                'quiz' => 'quiz_view',
                'graph' => 'chart',
                'footer' => 'footer');
            $this->template->load('main_master', $partials, $data);
        }

        function switchLanguage($language = "") {
            $language = ($language != "") ? $language : "english";
            $this->session->set_userdata('site_lang', $language);
            redirect(base_url());
        }
    }
