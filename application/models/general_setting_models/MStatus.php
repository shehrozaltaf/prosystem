<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MStatus extends CI_Model
{
    function getAllStatuss()
    {
        $this->db->select('*');
        $this->db->from('hr_status');
        $this->db->where('isActive', 1);
        $this->db->order_By('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditStatus($id)
    {
        $this->db->select('*');
        $this->db->from('hr_status');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

}