<?php
    defined('BASEPATH') OR exit('No direct script access allowed');


    class Upload extends CI_Controller {


        public function __construct() {
            parent::__construct();

            $this->load->helper('form');
            $this->load->helper('url');
        }

        public function index() {
            if ($this->config->config['upload_access']) {

                $data['title'] = 'Upload CSV file';

                $this->load->view('upload_form', $data);
            } else {
                redirect('/home');
            }
        }

        public function do_upload() {
            $data['title'] = 'Upload CSV file';
            $year = $this->input->post('year');

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'csv';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $year;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
                $data['error'] = $this->upload->display_errors();
            } else {
                $data['success'] = 'Upload successful';
                $this->filtercsv($year);
            }

            $this->load->view('upload_form', $data);
        }

        private function filtercsv($year) {
            $row = 1;
            $data = array();
            $previous_id = NULL;
            $category = new stdClass();
            $total = new stdClass();
            $dataTotal = array();
            $count=0;

            if (($handle = fopen('./uploads/' . $year . '.csv', 'rb')) !== FALSE) {
                while (($line = fgetcsv($handle, 10000, ',')) !== FALSE) {
                    if ($line[2] === 'TOT' && $line[4] === 'S1300') {

                        if ($line[0] === 'TOT') {
                            $total->id = $line[0];
                            $total->name = $line[1];
                            $total->government = $line[5];
                            $total->year = $line[8];
                            $total->value = $line[10];
                            $total->categories = $dataTotal;

                            $data[$line[0]] = $total;
                            $category = new stdClass();
                            $count=0;
                        }

                        if ($line[0] !== 'TOT' && strlen($line[0]) === 3) {
                            $category->id = $line[0];
                            $category->name = $line[1];
                            $category->government = $line[5];
                            $category->year = $line[8];
                            $category->value = $line[10];
                            $category->subcategories = array();
                        }

                        if (strpos($line[0], $previous_id) !== false) {
                            $subcategory = new stdClass();
                            $subcategory->id = $line[0];
                            $subcategory->name = $line[1];
                            $subcategory->value = $line[10];

                            if (empty((array)$category) && empty($dataTotal) === false) {
                                $dataTotal[$previous_id]->subcategories[] = $subcategory;

                            } else {
                                $category->subcategories[] = $subcategory;

                                $dataTotal[$category->id] = $category;

                                if (empty((array)$category) && empty($data) === false && $count==1) {
                                    $total->categories[] = $category;
                                    $count++;
                                } else {
                                    $total->categories[] = $category;
                                    $count++;
                                }

                            }

                            $category = new stdClass();
                            $count=0;
                        }

                        if (strlen($line[0]) === 3) {
                            $previous_id = $line[0];
                        }


                    }
                }
                fclose($handle);
            }

            file_put_contents('./uploads/' . $year . '.json', json_encode($data));
        }

        public function checkPassword() {
            $password = $this->input->post('password-input');

            if ($password !== $this->config->config['password']) {
                redirect('/home');
            }

            $this->config->set_item('upload_access',TRUE);
            $this->index();
        }
    }