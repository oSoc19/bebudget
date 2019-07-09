<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Quiz_model extends CI_Model {

        public function __construct() {
            parent::__construct();

            $url = 'http://84.195.17.11/api/2017.json';
            $this->data = json_decode(file_get_contents($url));

            $this->load->helper('form');
        }

        public function generateQuestions() {

            //TODO change this value
            // $random = rand(0, 4);
            $random = 0;
            $question = new stdClass();
            $questions = array();

            switch ($random) {
                case 0:
                    $answers = $this->generateCategories();
                    $question->question = "Where does the government spend most?";
                    $question->answers = $answers->categories;
                    $question->correctAnswer = $answers->correctAnswer;

                    $questions[] = $question;
                    break;
            }

            return $questions;
        }

        // Helper function to generate 3 random categories
        private function generateCategories() {
            $categories = array();
            $previousCategories = array();
            $values = array();
            $answers = new stdClass();

            for ($i = 0; $i < 3; $i++) {
                $random = str_pad(rand(1, count((array)$this->data) - 1), 2, '0', STR_PAD_LEFT);

                if (!in_array($random, $previousCategories, TRUE)) {
                    // Pick a random category
                    $category = $this->data->{'F' . $random};
                    $category->name = $this->removeNumbersFromName($category->name);
                    $categories[] = $category;
                    $values[] = $category->value;
                    $previousCategories[] = $random;
                } else {
                    $i--;
                }
            }

            $answers->categories = $categories;
            $answers->correctAnswer = max($values);
            return $answers;
        }

        // Helper function to remove the numbers from the name of a category
        private function removeNumbersFromName($name) {
            $parts = explode(' ', $name);
            array_shift($parts);
            return implode(' ', $parts);
        }
    }