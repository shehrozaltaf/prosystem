<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MDegree extends CI_Model
{
    function getAllDegrees()
    {
        $this->db->select('*');
        $this->db->from('hr_degree');
        $this->db->where('isActive', 1);
        $this->db->order_By('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditDegree($id)
    {
        $this->db->select('*');
        $this->db->from('hr_degree');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function chkDuplicateByName($name)
    {
        $this->db->select('*');
        $this->db->from('hr_degree');
        $this->db->where('degree', $name);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

}