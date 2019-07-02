<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @property Categorie_model $categorie_model
 */

class Home extends CI_Controller {

    public function index()
    {
        $data['titel'] = 'Index';

        $this->load->model('categorie_model');
        $data['categories'] = $this->categorie_model->getAllByNaam();
        $partials = array('hoofding' => 'main_header',
            'inhoud' => 'test');
        $this->template->load('main_master', $partials, $data);
    }
}
