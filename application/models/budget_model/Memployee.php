<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Memployee extends CI_Model
{

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('employee');
        $this->db->order_By('id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

}