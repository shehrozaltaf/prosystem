<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MEntity extends CI_Model
{
    function getAllEntitys()
    {
        $this->db->select('*');
        $this->db->from('hr_entity');
        $this->db->where('isActive', 1);
        $this->db->order_By('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditEntity($id)
    {
        $this->db->select('*');
        $this->db->from('hr_entity');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function chkDuplicateByName($name)
    {
        $this->db->select('*');
        $this->db->from('hr_entity');
        $this->db->where('entity', $name);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

}