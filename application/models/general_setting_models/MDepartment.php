<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MDepartment extends CI_Model
{
    function getAllDepartments()
    {
        $this->db->select('*');
        $this->db->from('hr_dept');
        $this->db->where('isActive', 1);
        $this->db->order_By('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditDepartment($id)
    {
        $this->db->select('*');
        $this->db->from('hr_dept');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

}