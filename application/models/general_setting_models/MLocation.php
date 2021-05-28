<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class MLocation extends CI_Model
{
    function getAllLocations()
    {
        $this->db->select('*');
        $this->db->from('location');
        $this->db->where('isActive', 1);
        $this->db->order_By('id', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    function getEditLocation($id)
    {
        $this->db->select('*');
        $this->db->from('location');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    function chkDuplicateByName($name)
    {
        $this->db->select('*');
        $this->db->from('location');
        $this->db->where('location', $name);
        $this->db->where('isActive', 1);
        $query = $this->db->get();
        return $query->result();
    }

}