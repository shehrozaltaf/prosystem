<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Memployee extends CI_Model
{

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->where('isActive', 1);
        $this->db->order_By('idEmp', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

}