<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MCategoryHR extends CI_Model
{
    function getAllCategorys()
    {
        $this->db->select('*');
        $this->db->from('hr_category');
        $this->db->where('isActive', 1);
        $this->db->order_By('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditCategory($id)
    {
        $this->db->select('*');
        $this->db->from('hr_category');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }
    function chkDuplicateByName($name)
    {
        $this->db->select('*');
        $this->db->from('hr_category');
        $this->db->where('category', $name);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }
}