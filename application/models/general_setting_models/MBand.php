<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MBand extends CI_Model
{
    function getAllBands()
    {
        $this->db->select('*');
        $this->db->from('hr_band');
        $this->db->where('isActive', 1);
        $this->db->order_By('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditBand($id)
    {
        $this->db->select('*');
        $this->db->from('hr_band');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function chkDuplicateByName($name)
    {
        $this->db->select('*');
        $this->db->from('hr_band');
        $this->db->where('band', $name);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

}