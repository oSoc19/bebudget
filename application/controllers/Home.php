<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property Category_model $category_model
 * @property Expense_model $expense_model
 */
class Home extends CI_Controller
{

    public function index2()
    {
        $data['titel'] = 'About';

        $this->load->model('category_model');
        $data['categories'] = $this->category_model->getAllByNaam();
        $partials = array('hoofding' => 'main_header',
            'nav' => 'main_nav',
            'inhoud' => 'piechart_NL');
        $this->template->load('main_master', $partials, $data);
    }

    public function index()
    {
        $data['titel'] = 'About';

        $this->load->model('expense_model');
        $data['expenses'] = $this->expense_model->getCategories();

        $partials = array('hoofding' => 'main_header',
            'nav' => 'main_nav',
            'inhoud' => 'test');
        $this->template->load('main_master', $partials, $data);
    }
}
