<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MField extends CI_Model
{
    function getAllFields()
    {
        $this->db->select('*');
        $this->db->from('hr_field');
        $this->db->where('isActive', 1);
        $this->db->order_By('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditField($id)
    {
        $this->db->select('*');
        $this->db->from('hr_field');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function chkDuplicateByName($name)
    {
        $this->db->select('*');
        $this->db->from('hr_field');
        $this->db->where('field', $name);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

}