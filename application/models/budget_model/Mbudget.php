<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mbudget extends CI_Model
{

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('b_budget');
        $this->db->where('isActive', 1);
        $this->db->order_By('idBugt', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getDesignation($band)
    {
        $this->db->select('*');
        $this->db->from('hr_desig');
        $this->db->where('band', $band);
        $this->db->order_By('desig', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

}