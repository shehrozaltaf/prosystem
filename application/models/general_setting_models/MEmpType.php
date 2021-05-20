<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MEmpType extends CI_Model
{
    function getAllEmpTypes()
    {
        $this->db->select('*');
        $this->db->from('hr_emptype');
        $this->db->where('isActive', 1);
        $this->db->order_By('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditEmpType($id)
    {
        $this->db->select('*');
        $this->db->from('hr_emptype');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

}