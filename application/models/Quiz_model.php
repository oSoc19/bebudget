<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Quiz_model extends CI_Model {

        public function __construct() {
            parent::__construct();

            $this->data = json_decode(file_get_contents('./uploads/2017.json'));

            $this->load->helper('form');
        }

        public function generateQuestions() {

            $numberOfQuestions = 5;
            $questions = array();

            for ($i = 0; $i < $numberOfQuestions; $i++) {
                $random = rand(0, 3);
                $question = new stdClass();

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

                    // Remove the numbers from the name of the category
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

            // Prepare object and pass to frontend
            $data->categories = $categories;
            $data->correctAnswer = max($values);
            return $data;
        }

        // Helper function to generate 1 random category with 3 possible answers
        private function generateCategoryWithAnswers() {
            $data = new stdClass();
            $answers = array();

            // Pick a random category
            $random = rand(0, count((array)$this->data->{'TOT'}->categories) - 1);
            $category = $this->data->{'TOT'}->categories[$random];

            // Remove the numbers from the name of the category
            $category->name = $this->removeNumbersFromName($category->name);

            // Get the minimum and maximum values to get a range of 70% of the value
            $minimum = $category->value - (0.7 * $category->value);
            $maximum = $category->value + (0.7 * $category->value);

            // Set two random answers and the correct answer
            $answer1 = rand($minimum, $maximum);
            $answer2 = rand($minimum, $maximum);
            $answer3 = $category->value;

            // Turn the million number into a nice text e.g.: 7485 => 7.49 Billion
            $answer1 = '€' . $this->prettifyNumber((string)$answer1 . "000000");
            $answer2 = '€' . $this->prettifyNumber((string)$answer2 . "000000");
            $answer3 = '€' . $this->prettifyNumber((string)$answer3 . "000000");

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

            // Pick a random category
            $random = rand(0, count((array)$this->data->{'TOT'}->categories) - 1);
            $category = $this->data->{'TOT'}->categories[$random];

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
            // Don't include commas or dots in the number
            $number = str_replace(",", "", $number);
            $number = str_replace(".", "", $number);

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