<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MStatusHR extends CI_Model
{
    function getAllStatusHR()
    {
        $this->db->select('*');
        $this->db->from('hr_status');
        $this->db->where('isActive', 1);
        $this->db->order_By('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditStatusHR($id)
    {
        $this->db->select('*');
        $this->db->from('hr_status');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function chkDuplicateByName($name)
    {
        $this->db->select('*');
        $this->db->from('hr_status');
        $this->db->where('status', $name);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

}