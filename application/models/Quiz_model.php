<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Quiz_model extends CI_Model {

        public function __construct() {
            parent::__construct();

            //            $url = 'http://84.195.17.11/api/2017.json';
            //            $this->data = json_decode(file_get_contents($url));
            $this->data = json_decode(file_get_contents('./uploads/2017.json'));

            $this->load->helper('form');
        }

        public function generateQuestions() {

            $numberOfQuestions = 5;
            //TODO for loop for $numberOfQuestions

            //TODO change this value to:
            // $random = rand(0, 4);
            $random = 0;
            $question = new stdClass();
            $questions = array();

            switch ($random) {
                case 0:
                    $data = $this->generateThreeCategories();
                    $question->question = 'Where does the government spend most?';
                    $question->answers = $data->categories;
                    $question->correctAnswer = $data->correctAnswer;

                    $questions[] = $question;
                    break;
                case 1:
                    $data = $this->generateCategoryWithAnswers();
                    $question->question = 'How much money is spent on ' . $data->category . '?';
                    $question->answers = $data->answers;
                    $question->correctAnswer = $data->correctAnswer;

                    $questions[] = $question;
                    break;
                case 2:
                    $data = $this->generateCategoryWithAnswersInPercentages();
                    $question->question = 'What percentage of government expenditure goes to ' . $data->category . '?';
                    $question->answers = $data->answers;
                    $question->correctAnswer = $data->correctAnswer;

                    $questions[] = $question;
                    break;
                case 3:
                    $data = $this->generateTwoCategories();
                    $question->question = 'More is spent on ' . $data->firstCategory . ' than ' . $data->secondCategory . '.';
                    $question->correctAnswer = $data->correctAnswer;

                    $questions[] = $question;
                    break;
            }

            return $questions;
        }

        // Helper function to generate 3 random categories
        private function generateThreeCategories() {
            $categories = array();
            $previousCategories = array();
            $values = array();
            $data = new stdClass();

            for ($i = 0; $i < 3; $i++) {
                // Generate a random number within the length of the categories array
                $random = rand(0, count((array)$this->data->{'TOT'}->categories) - 1);

                // Check if the random number is already in the array so it can't pick the same category twice
                if (!in_array($random, $previousCategories, TRUE)) {
                    // Pick a random category
                    $category = $this->data->{'TOT'}->categories[$random];

                    // Get rid of the numbers in the name
                    $category->name = $this->removeNumbersFromName($category->name);

                    // Add the random category to the array and save its value
                    $categories[] = $category;
                    $values[] = $category->value;

                    // Add random category to previousCategory array so it can't be picked again
                    $previousCategories[] = $random;
                } else {
                    // Pick a new random number if it was already in the array
                    $i--;
                }
            }

            $data->categories = $categories;
            $data->correctAnswer = max($values);
            return $data;
        }

        // Helper function to generate 1 random category with 3 possible answers
        private function generateCategoryWithAnswers() {
            $data = new stdClass();
            $answers = array();

            $random = rand(0, count((array)$this->data->{'TOT'}->categories) - 1);
            $category = $this->data->{'TOT'}->categories[$random];

            $category->name = $this->removeNumbersFromName($category->name);

            $minimum = $category->value - (0.7 * $category->value);
            $maximum = $category->value + (0.7 * $category->value);

            $answer1 = rand($minimum, $maximum);
            $answer2 = rand($minimum, $maximum);

            $answers[] = (int)$category->value;
            $answers[] = $answer1;
            $answers[] = $answer2;

            shuffle($answers);

            $data->category = $category->name;
            $data->answers = $answers;
            $data->correctAnswer = $category->value;

            return $data;
        }

        // Helper function to generate 1 random category with 3 possible answers in percentages
        private function generateCategoryWithAnswersInPercentages() {

        }

        // Helper function to generate 2 random categories (answers not included because of true or false)
        private function generateTwoCategories() {

        }

        // Helper function to remove the numbers from the name of a category
        private function removeNumbersFromName($name) {
            //Split up the words of the name into an array
            $parts = explode(' ', $name);

            // Remove the first element of the array, which will be the number
            array_shift($parts);

            // Put the name back together and return it
            return implode(' ', $parts);
        }
    }