<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Quiz_model extends CI_Model {

        public function __construct() {
            parent::__construct();

            /*$data_language = $this->config->config['language'];*/
            $this->data = json_decode(file_get_contents('./uploads/' .$this->lang->line("chart_file")));
            $this->usedCategories = array();

            $this->load->helper('form');
        }

        public function generateQuestions() {
//            $data_language = $this->config->config['language'];
//            $this->data = json_decode(file_get_contents("./uploads/data_$data_language.json"));

            $numberOfQuestions = 5;
            $questionType = -1;
            $questions = array();

            for ($i = 0; $i < $numberOfQuestions; $i++) {

                if ($questionType < 3) {
                    $questionType++;
                } else {
                    $questionType = rand(0, 3);
                }

                $question = new stdClass();

                switch ($questionType) {
                    case 0:
                        $data = $this->generateThreeCategories();
                        $question->question = $this->lang->line("quiz_question1");
                        $question->answers = $data->categories;
                        $question->correctAnswer = $data->correctAnswer;

                        $questions[] = $question;
                        break;
                    case 1:
                        $data = $this->generateCategoryWithAnswers();
                        $question->question = $this->lang->line("quiz_question2") . $data->category . '?';
                        $question->answers = $data->answers;
                        $question->correctAnswer = $data->correctAnswer;

                        $questions[] = $question;
                        break;
                    case 2:
                        $data = $this->generateCategoryWithAnswersInPercentages();
                        $question->question = $this->lang->line("quiz_question3") . $data->category . '?';
                        $question->answers = $data->answers;
                        $question->correctAnswer = $data->correctAnswer;

                        $questions[] = $question;
                        break;
                    case 3:
                        $data = $this->generateTwoCategories();
                        $question->question = $this->lang->line("quiz_question4_first") . $data->firstCategory . $this->lang->line("quiz_question4_second") . $data->secondCategory . '.';
                        $question->answers = $data->answers;
                        $question->correctAnswer = $data->correctAnswer;

                        $questions[] = $question;
                        break;
                }
            }

            return $questions;
        }

        // Helper function to generate 3 random categories
        private function generateThreeCategories() {
            $categories = array();
            $previousRandomNumbers = array();
            $previousCategories = array();
            $data = new stdClass();

            for ($i = 0; $i < 3; $i++) {
                // Generate a random number within the length of the categories array
                $random = rand(0, count((array)$this->data->{'TOT'}->categories) - 1);

                // Check if the random number is already in the array so it can't pick the same category twice
                if (!in_array($random, $previousRandomNumbers, TRUE)) {
                    // Pick a random category
                    $category = $this->data->{'TOT'}->categories[$random];

                    // Remove the numbers from the name of the category
                    $category->name = $this->removeNumbersFromName($category->name);

                    // Add the random category to its array
                    $categories[] = $category;

                    // Keep category in global array so it can't be used again
                    $this->usedCategories[] = $category;

                    // Add random category to previousCategory array so it can't be picked again
                    $previousRandomNumbers[] = $random;
                    $previousCategories[] = $category;
                } else {
                    // Pick a new random number if it was already in the array
                    $i--;
                }
            }

            // Get the name of the category that has the highest value
            $max_value = 0;
            foreach ($previousCategories as $category) {
                if ($category->value > $max_value) {
                    $name = $category->name;
                    $max_value = $category->value;
                }
            }

            // Prepare object and pass to frontend
            $data->categories = $categories;
            $data->correctAnswer = $name;
            return $data;
        }

        // Helper function to generate 1 random category with 3 possible answers
        private function generateCategoryWithAnswers() {
            $data = new stdClass();
            $answers = array();
            $categoryAvailable = TRUE;

            // Pick a different category if the current one is already used in a different question
            while ($categoryAvailable) {
                // Pick a random category
                $random = rand(0, count((array)$this->data->{'TOT'}->categories) - 1);
                $category = $this->data->{'TOT'}->categories[$random];

                // Check if the category is available
                if (!in_array($category, $this->usedCategories)) {
                    $this->usedCategories[] = $category;
                    $categoryAvailable = FALSE;
                }
            }


            // Remove the numbers from the name of the category
            $category->name = $this->removeNumbersFromName($category->name);

            // Get the minimum and maximum values to get a range of 70% of the value
            $minimum = round($category->value - (0.7 * $category->value), 1);
            $maximum = round($category->value + (0.7 * $category->value), 1);

            // Set two random answers and the correct answer
            $answer1 = rand($minimum, $maximum);
            $answer2 = rand($minimum, $maximum);
            $answer3 = $category->value;

            // Turn the million number into a nice text e.g.: 7485 => 7.49 Billion
            $answer1 = '€' . $this->prettifyNumber($answer1);
            $answer2 = '€' . $this->prettifyNumber($answer2);
            $answer3 = '€' . $this->prettifyNumber($answer3);

            // Add the answers to their array
            $answers[] = $answer1;
            $answers[] = $answer2;
            $answers[] = $answer3;

            // Shuffle the answers
            shuffle($answers);

            // Prepare object and pass to frontend
            $data->category = $category->name;
            $data->answers = $answers;
            $data->correctAnswer = $answer3;
            return $data;
        }

        // Helper function to generate 1 random category with 3 possible answers in percentages
        private function generateCategoryWithAnswersInPercentages() {
            $data = new stdClass();
            $answers = array();
            $categoryAvailable = TRUE;

            // Pick a different category if the current one is already used in a different question
            while ($categoryAvailable) {
                // Pick a random category
                $random = rand(0, count((array)$this->data->{'TOT'}->categories) - 1);
                $category = $this->data->{'TOT'}->categories[$random];

                // Check if the category is available
                if (!in_array($category, $this->usedCategories)) {
                    $this->usedCategories[] = $category;
                    $categoryAvailable = FALSE;
                }
            }
            // Remove the numbers from the name of the category
            $category->name = $this->removeNumbersFromName($category->name);

            // Get the total value
            $total = $this->data->{'TOT'}->value;

            // Get the minimum and maximum values to get a range of 70% of the value
            $minimum = $category->value - (0.7 * $category->value);
            $maximum = $category->value + (0.7 * $category->value);

            // Set two random answers and the correct answer
            $answer1 = rand($minimum, $maximum);
            $answer2 = rand($minimum, $maximum);
            $answer3 = $category->value;

            // Convert millions to percentages
            $percentage1 = round(($answer1 / $total) * 100, 2) . '%';
            $percentage2 = round(($answer2 / $total) * 100, 2) . '%';
            $percentage3 = round(($answer3 / $total) * 100, 2) . '%';

            // Add the answers to their array
            $answers[] = $percentage1;
            $answers[] = $percentage2;
            $answers[] = $percentage3;

            // Shuffle the answers
            shuffle($answers);

            // Prepare object and pass to frontend
            $data->category = $category->name;
            $data->answers = $answers;
            $data->correctAnswer = $percentage3;
            return $data;

        }

        // Helper function to generate 2 random categories (answers not included because of true or false)
        private function generateTwoCategories() {
            $categories = array();
            $previousCategory = NULL;
            $correctAnswer = 'False';
            $data = new stdClass();

            for ($i = 0; $i < 2; $i++) {
                // Generate a random number within the length of the categories array
                $random = rand(0, count((array)$this->data->{'TOT'}->categories) - 1);

                // Check if the random number is the same as the last one
                if ($previousCategory !== $random) {
                    // Pick a random category
                    $category = $this->data->{'TOT'}->categories[$random];

                    // Check if the category is available
                    if (!in_array($category, $this->usedCategories)) {
                        $this->usedCategories[] = $category;
                    } else {
                        $i--;
                        continue;
                    }

                    // Remove the numbers from the name of the category
                    $category->name = $this->removeNumbersFromName($category->name);

                    // Add the random category to the array and save its value
                    $categories[] = $category;

                    // Add random category to previousCategory array so it can't be picked again
                    $previousCategory = $random;
                } else {
                    // Pick a new random number if it was already in the array
                    $i--;
                }
            }

            // Put the 2 categories into their own variable
            $firstCategory = $categories[0];
            $secondCategory = $categories[1];

            // Check which value is bigger
            if ($firstCategory->value > $secondCategory->value) {
                $correctAnswer = 'True';
            }

            // Prepare object and pass to frontend
            $data->firstCategory = $firstCategory->name;
            $data->secondCategory = $secondCategory->name;
            $data->answers = array('True', 'False');
            $data->correctAnswer = $correctAnswer;
            return $data;
        }

        // Helper function to remove the numbers from the name of a category
        private function removeNumbersFromName($name) {
            //Split up the words of the name into an array
            $parts = explode(' ', $name);

            // Check if the first part is numeric
            if (is_numeric($parts[0])) {
                // Remove the numeric element of the array
                array_shift($parts);
            }

            // Put the name back together and return it
            return implode(' ', $parts);
        }

        private function prettifyNumber($number) {
            if (strpos($number, '.') || strpos($number, ',')) {
                // Don't include commas or dots in the number
                $number = str_replace(',', '', $number);
                $number = str_replace('.', '', $number);
                $number .= "00000";
            } else {
                $number .= "000000";
            }

            // Check if the number is an actual number
            if (!is_numeric($number)) return false;

            // Put the correct value behind the number
            if ($number > 1000000000000) return round(($number / 1000000000000), 2) . ' trillion';
            elseif ($number > 1000000000) return round(($number / 1000000000), 2) . ' billion';
            elseif ($number > 1000000) return round(($number / 1000000), 2) . ' million';
            elseif ($number > 1000) return $number;

            return number_format($number);
        }
    }