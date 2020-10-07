<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mprojected extends CI_Model
{

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('projected');
        $this->db->where('isActive', 1);
        $this->db->order_By('idPrjn', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

}