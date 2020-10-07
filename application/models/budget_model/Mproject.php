<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Mproject extends CI_Model
{

    function getAll()
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where('isActive', 1);
        $this->db->order_By('idProject', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

}