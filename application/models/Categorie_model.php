<?php

class Categorie_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAllByNaam()
    {
        $this->db->order_by('Column_2018_CE_VK', 'desc');
        $query = $this->db->get('Categories');
        return $query->result();
    }

}
?>