<?php

class Categorie_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAllByNaam()
    {
        $this->db->order_by('SPF_FOD_NL', 'asc');
        $query = $this->db->get('Categories');
        return $query->result();
    }

}
?>