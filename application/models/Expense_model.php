<?php

class Expense_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getCategories()
    {
        $this->db->order_by('Value','desc');
        $this->db->where('NFGOVCOFOG_ITEM', 'TOT');
        $this->db->where('NFGOVCOFOG_SECTOR', 'S1300');
        $query = $this->db->get('uitgaven');
        return $query->result();
    }

}
?>