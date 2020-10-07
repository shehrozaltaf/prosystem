<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mactual extends CI_Model
{

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('b_actual');
        $this->db->where('isActive', 1);
        $this->db->order_By('idActual', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

}