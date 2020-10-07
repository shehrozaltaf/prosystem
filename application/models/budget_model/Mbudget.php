<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mbudget extends CI_Model
{

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('budget');
        $this->db->where('isActive', 1);
        $this->db->order_By('idBugt', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

}